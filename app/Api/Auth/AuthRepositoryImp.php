<?php

namespace App\Api\Auth;
use App\Models\User;
class AuthRepositoryImp implements AuthRepository
{
    protected User $userModel;
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }
    public function register(array $data)
    {
        return $this->userModel::create($data);
    }
}
