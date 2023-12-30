<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserCatalogueRequest;
use App\Repositories\Interfaces\UserCatalogueRepositoryInterface;
use App\Services\UserCatalogueService;
use Illuminate\Http\Request;

class UserCatalogueController extends Controller
{
    protected UserCatalogueService $userCatalogueService;
    protected UserCatalogueRepositoryInterface $userCatalogueRepository;
    public function __construct(UserCatalogueService $userCatalogueService, UserCatalogueRepositoryInterface $userCatalogueRepository)
    {
        $this->userCatalogueService = $userCatalogueService;
        $this->userCatalogueRepository = $userCatalogueRepository;
    }

    public function index(Request $request)
    {
        $userCatalogues = $this->userCatalogueService->paginate($request);

        $config = [
            'js' => [
                'backend/js/plugins/switchery/switchery.js',
            ],
            'css' => [
                'backend/css/plugins/switchery/switchery.css'
            ]
        ];
        $config['seo'] = config('apps.userCatalogue');

        $template = 'backend.user.catalogue.index';
        return view('backend.dashboard.layout',
            compact(
                'template',
                'config',
                'userCatalogues'
            )
        );
    }

    public function create()
    {
        $config['seo'] = config('apps.userCatalogue');

        $template = 'backend.user.catalogue.create';
        return view('backend.dashboard.layout',
            compact('template', 'config'));
    }

    public function store(StoreUserCatalogueRequest $request)
    {
        if ($this->userCatalogueService->create($request)) {
            return redirect()->route('user.catalogue.index')->with('success', 'Thêm mới bản ghi thành công');
        }
        return redirect()->route('user.catalogue.create')->with('error', 'Thêm mới bản ghi không thành công. Hãy thử lại');
    }

    public function edit($id)
    {
        $catalogue = $this->userCatalogueRepository->findById($id);

        $config = [
            'css' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css',
            ],
            'js' => [
                'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js',
                'backend/libraries/location.js',
            ],
        ];
        $config['seo'] = config('apps.userCatalogue');

        $template = 'backend.user.catalogue.edit';
        return view('backend.dashboard.layout',
            compact(
                'template',
                    'config', 'catalogue')
        );
    }

    public function update(StoreUserCatalogueRequest $request, $id)
    {
        if ($this->userCatalogueService->update($request, $id)) {
            return redirect()->route('user.catalogue.index')->with('success', 'Cập nhật bản ghi thành công');
        }
        return redirect()->route('user.catalogue.edit')->with('error', 'Cập nhật bản ghi không thành công. Hãy thử lại');
    }

    public function delete($id)
    {
        $catalogue = $this->userCatalogueRepository->findById($id);
        $config['seo'] = config('apps.user');
        $template = 'backend.user.catalogue.delete';
        return view('backend.dashboard.layout', compact('template', 'catalogue', 'config'));
    }

    public function destroy($id)
    {
        if ($this->userCatalogueService->destroy($id)) {
            return redirect()->route('user.catalogue.index')->with('success', 'Xóa bản ghi thành công');
        }
        return redirect()->route('user.catalogue.delete')->with('error', 'Xóa bản ghi không thành công');
    }
}
