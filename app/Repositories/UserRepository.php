<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUserById(string $id)
    {
        return $this->user->find($id);
    }

    public function getUsers(int $numberPage)
    {
        return $this->user->paginate($numberPage);
    }

    public function createUser(array $data)
    {
        return $this->user->create($data);
    }

    public function updateUser(array $data, User $user)
    {
        return $user->update($data);
    }

    public function deleteUser(User $user)
    {
        return $user->delete();
    }
}
