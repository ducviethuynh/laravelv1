<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\DistrictRepositoryInterface;
use App\Repositories\Interfaces\ProvinceRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    protected DistrictRepositoryInterface $districtRepository;
    protected ProvinceRepositoryInterface $provinceRepository;
    public function __construct(
        DistrictRepositoryInterface $districtRepository,
        ProvinceRepositoryInterface $provinceRepository)
    {
        $this->districtRepository = $districtRepository;
        $this->provinceRepository = $provinceRepository;
    }

    public function index()
    {

    }

    public function getLocation(Request $request)
    {
//        $province_id = $request->input('province_id');
        //        DB::enableQueryLog();
        $get = $request->input();
//        dd($get);
        $html = '';

        //        dd(DB::getQueryLog());
//        $districts = $this->districtRepository->findDistrictByProvinceId($province_id);
//        $districts = $province->districts->toArray();
        if ($get['target'] === 'districts') {
            $province = $this->provinceRepository->findById($get['data']['location_id'], ['*'], ['districts']);
            $html = $this->renderHtml($province->districts);
        }
        else if ($get['target'] === 'wards') {
            $district = $this->districtRepository->findById($get['data']['location_id'], ['*'], ['wards']);
            $html = $this->renderHtml($district->wards, '--[Chọn Phường/Xã]--');
        }

        $response = [
            'html' => $html,
        ];
//        $response = [
//            'html' => $this->renderHtml($province->districts),
//        ];
        //        dd($response);
        return response()->json($response);
    }

    public function renderHtml($districts, $root = '--[Chọn Quận/Huyện]--')
    {
        $html = '<option value="0">'.$root.'</option>';
        foreach ($districts as $district) {
            $html .= '<option value="' . $district->code . '">' . $district->name . '</option>';
        }
        return $html;
    }
}
