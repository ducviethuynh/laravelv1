<?php

namespace App\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    public function all();
    public function findById(int $modelId, array $colunm = ['*'], array $relation = []);
    public function create($payload = []);
    public function update($payload = [], $id = 0);
    public function delete($id);
    public function pagination($column = ['*'], $condition = [], $join = [], $perpage = 20);
}

