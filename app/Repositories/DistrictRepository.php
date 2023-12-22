<?php

namespace App\Repositories;

use App\Models\District;
use App\Repositories\Interfaces\DistrictRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface
{
    protected $model;
    public function __construct(District $model)
    {
        $this->model = $model;
    }

    public function findDistrictByProvinceId(int $province_id)
    {
        return $this->model->where('province_code', '=', $province_id);
    }
}