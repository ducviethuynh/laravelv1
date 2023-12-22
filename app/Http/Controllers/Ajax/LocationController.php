<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\DistrictRepositoryInterface;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    protected $districtRepository;
    public function __construct(DistrictRepositoryInterface $districtRepository)
    {
        $this->districtRepository = $districtRepository;
    }

    public function index()
    {

    }

    public function getLocation(Request $request)
    {
        $district_id = $request->input('province_id');
        $districts = $this->districtRepository->findDistrictByProvinceId($district_id);
        $response = [
            'html' => $this->renderHtml($districts),
        ];
        return response()->json($response);
    }

    public function renderHtml($districts)
    {
        $html = '';
        foreach ($districts as $district) {
            $html .= '<option value="'. $district->code .'">'. $district->name .'</option>';
        }

        return $html;
    }
}
