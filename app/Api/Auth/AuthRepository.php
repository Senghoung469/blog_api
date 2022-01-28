<?php

namespace App\Api\Auth;

interface AuthRepository
{
    public function register(array $data);
}
