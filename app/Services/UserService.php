<?php

namespace App\Services;

use App\Helpers\PayloadHelper;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{

    use PayloadHelper;

    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserById(string $id)
    {
        return $this->userRepository->getUserById($id);
    }

    public function getUsers(int $numberPage = 10)
    {
        return $this->userRepository->getUsers($numberPage);
    }

    public function createUser(Request $request)
    {
        $data = $request->all();
        return $this->userRepository->createUser($data);
    }

    public function updateUser(Request $request, string $id)
    {
        $user = $this->userRepository->getUserById($id);
        $data = $this->getPayloadFillable($request->all(), (new User())->getFillable());
        return $this->userRepository->updateUser($data, $user);
    }

    public function deleteUser(string $id)
    {
        $user = $this->userRepository->getUserById($id);
        return $this->userRepository->deleteUser($user);
    }
}
