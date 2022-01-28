<?php

namespace App\Api\User;
use App\Models\User;

class UserRepositoryImp implements UserRepository
{
    protected User $userModel;
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getUser($id)
    {
        return $this->userModel::find($id);
    }

    public function getAllUser()
    {
        return $this->userModel::paginate();
    }

    public function createUser(array $data)
    {
        return $this->userModel::create($data);
    }

    public function updateUser($id, $data)
    {
        $user =  $this->userModel::find($id);
        $user->update($data);
        return $user;
    }

    public function deleteUser($id)
    {
        return $this->userModel->destroy($id);
    }
}
