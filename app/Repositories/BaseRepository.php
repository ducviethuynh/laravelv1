<?php

namespace App\Repositories;

use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function pagination($column = ['*'], $condition = [], $join = [], $extend = [], $perpage = 1)
    {
        $query = $this->model->select($column)->where(function ($query) use ($condition) {
            if (!empty($condition['keyword'])) {
                $query->where('name', 'LIKE', '%'.$condition['keyword'].'%');
            }
        });

        if (!empty($join)) {
            $query->join(...$join);
        }

        return $query->paginate($perpage)->withQueryString()->withPath(env('APP_URL').$extend['path']);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function findById($modelId, $colunm = ['*'], $relation = [])
    {
        return $this->model->select($colunm)->with($relation)->findOrFail($modelId);
    }

    public function create($payload = [])
    {
        $model = $this->model->create($payload);

        return $model->fresh();
    }

    public function update($id = 0, $payload = [])
    {
        $model = $this->findById($id);

        return $model->update($payload);
    }

    public function updateByWhereIn(string $whereInField = '', array $whereIn = [], array $payload = [])
    {
        return $this->model->whereIn($whereInField, $whereIn)->update($payload);
    }

    public function delete($id)
    {
        return $this->findById($id)->delete();
    }

    public function forceDelete($id)
    {
        return $this->findById($id)->forceDelete();
    }

}
