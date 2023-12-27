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

    public function pagination($column = ['*'], $condition = [], $join = [], $perpage = 20)
    {
        $query = $this->model->select($column)
            ->where($condition);

        if (!empty($join)) {
            $query->join(...$join);
        }

        return $query->paginate($perpage);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function findById(int $modelId, array $colunm = ['*'], array $relation = [])
    {
        return $this->model->select($colunm)->with($relation)->findOrFail($modelId);
    }

    public function create($payload = [])
    {
        $model = $this->model->create($payload);

        return $model->fresh();
    }

    public function update($payload = [], $id = 0)
    {
        $model = $this->findById($id);
        return $model->update($payload);
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
