<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repositories\Interfaces\ProvinceRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Http\Request;

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
        $config = $this->config();
        $users = $this->userService->paginate(10);

        $template = 'backend.user.index';
        return view('backend.dashboard.layout',
            compact('template', 'users', 'config'));
    }

    public function create()
    {
        $provinces = $this->provinceRepository->all();

        $config = $this->config();
        $template = 'backend.user.index';
        return view('backend.user.create',
            compact('template', 'config', 'provinces'));
    }

    private function config()
    {
        return [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css'
            ]
        ];
    }
}
