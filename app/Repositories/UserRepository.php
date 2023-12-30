<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }

//    public function getAllPaginate($record)
//    {
//        return User::paginate($record);
//    }

    public function pagination($column = ['*'], $condition = [], $join = [], $extend = [], $perpage = 1)
    {
        $query = $this->model->select($column)->where(function ($query) use ($condition) {
            if (!empty($condition['keyword'])) {
                $query->where('name', 'LIKE', '%'.$condition['keyword'].'%')
                    ->orWhere('phone', 'LIKE', '%'.$condition['keyword'].'%')
                    ->orWhere('email', 'LIKE', '%'.$condition['keyword'].'%')
                    ->orWhere('address', 'LIKE', '%'.$condition['keyword'].'%');
            }
            if (isset($condition['publish']) && $condition['publish'] !== 0) {
                $query->where('publish', '=', $condition['publish']);
            }

            return $query;
        });

        if (!empty($join)) {
            $query->join(...$join);
        }

        return $query->paginate($perpage)->withQueryString()->withPath(env('APP_URL').$extend['path']);
    }
}
