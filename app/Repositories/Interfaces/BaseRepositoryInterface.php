<?php

namespace App\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    public function all();
    public function findById($modelId, $colunm = ['*'], $relation = []);
    public function create($payload = []);
    public function update($id = 0, $payload = []);
    public function delete($id);
    public function pagination($column = ['*'], $condition = [], $join = [], $extend = [], $perpage = 1);
    public function updateByWhereIn(string $whereInField = '', array $whereIn = [], array $payload = []);
}

