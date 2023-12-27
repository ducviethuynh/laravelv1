<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\Interfaces\ProvinceRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;

class UserController extends Controller
{
    protected UserServiceInterface $userService;
    protected UserRepositoryInterface $userRepository;
    protected ProvinceRepositoryInterface $provinceRepository;
    public function __construct(
        UserServiceInterface $userService,
        ProvinceRepositoryInterface $provinceRepository,
        UserRepositoryInterface $userRepository)
    {
        $this->userService = $userService;
        $this->provinceRepository = $provinceRepository;
        $this->userRepository = $userRepository;
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

    public function edit($id)
    {
        $user = $this->userRepository->findById($id);
//        dd($user);
        $provinces = $this->provinceRepository->all();
        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/libraries/location.js',
            ],
        ];
        $config['seo'] = config('apps.user');
//        dd($config);
        $template = 'backend.user.edit';
        return view('backend.dashboard.layout',
            compact(
                'template',
                'config',
                'provinces',
                'user')
        );
    }

    public function update(UpdateUserRequest $request, $id)
    {
        if ($this->userService->update($request, $id)) {
            return redirect()->route('user.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('user.update')->with('error', 'Cập nhật  bản ghi không thành công');
    }

    public function delete($id)
    {
        $user = $this->userRepository->findById($id);
        $config['seo'] = config('apps.user');
        $template = 'backend.user.delete';
        return view('backend.dashboard.layout', compact('template', 'user', 'config'));
    }

    public function destroy($id)
    {
        if ($this->userService->destroy($id)) {
            return redirect()->route('user.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('user.delete')->with('error', 'Xóa bản ghi không thành công');
    }
}
