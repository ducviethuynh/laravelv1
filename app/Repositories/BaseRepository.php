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
}
