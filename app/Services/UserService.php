<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

/**
 * Class UserService.
 */
class UserService implements UserServiceInterface
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function paginate($record)
    {
        $user = $this->userRepository->pagination();
        return $user;
    }

    public function create($request)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send', 're_password']);
            $carbonDate = Carbon::createFromFormat('Y-m-d', $payload['birthday']);
            $payload['birthday'] = $carbonDate->format('Y-m-d');
            $payload['password'] = Hash::make($payload['password']);
            $user = $this->userRepository->create($payload);
//            dd($user);
            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            echo $exception->getMessage(); die();
            return false;
        }

    }

    public function update($request, $id)
    {
        DB::beginTransaction();
        try {
            $payload = $request->except(['_token', 'send']);
            $payload['birthday'] = $this->convertBirthdayDate($payload['birthday']);
//            dd($payload);
            $user = $this->userRepository->update($payload, $id);
//            dd($user);
            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            echo $exception->getMessage(); die();
            return false;
        }

    }

    private function convertBirthdayDate($birthday = '')
    {
        $carbonDate = Carbon::createFromFormat('Y-m-d', $birthday);

        return $carbonDate->format('Y-m-d');
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $user = $this->userRepository->delete($id);

            DB::commit();
            return true;
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error($exception->getMessage());
            echo $exception->getMessage();
            return false;
        }
    }
}
