<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Repositories\Interfaces\ProvinceRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;

class UserController extends Controller
{
    protected $userService;
    protected $provinceRepository;
    public function __construct(UserServiceInterface $userService, ProvinceRepositoryInterface $provinceRepository)
    {
        $this->userService = $userService;
        $this->provinceRepository = $provinceRepository;
    }

    public function index()
    {
        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css'
            ]
        ];
        $config['seo'] = config('apps.user');
//        dd($config['seo']);
        $users = $this->userService->paginate(10);

        $template = 'backend.user.index';
        return view('backend.dashboard.layout',
            compact(
                'template',
                'users',
                'config'
            )
        );
    }

    public function create()
    {
        $provinces = $this->provinceRepository->all();
        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/libraries/location.js',
//                'backend/plugins/ckfinder/ckfinder.js',
//                'backend/libraries/finder.js',
            ],
        ];
        $config['seo'] = config('apps.user');

        $template = 'backend.user.create';
        return view('backend.dashboard.layout',
            compact('template', 'config', 'provinces'));
    }

    public function store(StoreUserRequest $request)
    {
        if ($this->userService->create($request)) {
            return redirect()->route('user.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('user.create')->with('error', 'Thêm mới bản ghi không thành công');
    }
}
