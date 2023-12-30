<?php

namespace App\Services;

use App\Repositories\Interfaces\UserCatalogueRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class UserCatalogueService.
 */
class UserCatalogueService implements UserCatalogueRepositoryInterface
{
    protected $userCatalogueRepository;
    public function __construct(UserCatalogueRepositoryInterface $userCatalogueRepository)
    {
        $this->userCatalogueRepository = $userCatalogueRepository;
    }

    public function paginate($request)
    {
        $condition['keyword'] = addslashes($request->input('keyword'));
        $condition['publish'] = $request->integer('publish');
        $perpage = (int)$request->input('perpage');
        $users = $this->userCatalogueRepository->pagination($this->paginateSelect(), $condition, [], ['path' => 'user/catalogue/index'], $perpage);
        return $users;
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']);
//            dd($payload);
            $this->userCatalogueRepository->create($payload);
            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            echo $exception->getMessage();
            return false;
        }
    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']);
            $this->userCatalogueRepository->update($id, $payload);
            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            echo $exception->getMessage();
            return false;
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $user = $this->userCatalogueRepository->delete($id);

            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            echo $exception->getMessage();
            return false;
        }
    }

    public function updateStatus($post = [])
    {
        DB::beginTransaction();
        try {
            $payload = [
                $post['field'] => ($post['value'] == 1 ? 0 : 1),
            ];

            $user = $this->userCatalogueRepository->update($post['modelId'], $payload);
            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            echo $exception->getMessage();
            return false;
        }
    }

    private function paginateSelect() {
        return [
            'id',
            'name',
            'description',

        ];
    }
}
