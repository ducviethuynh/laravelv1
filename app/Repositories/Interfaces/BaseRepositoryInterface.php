<?php

namespace App\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    public function all();
    public function findById(int $modelId, array $colunm = ['*'], array $relation = []);
    public function create($payload = []);
}

