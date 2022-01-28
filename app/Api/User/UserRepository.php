<?php

namespace App\Api\User;

interface UserRepository
{
    public function getUser($id);
    public function getAllUser();
    public function createUser(array $data);
    public function updateUser($id, array $data);
    public function deleteUser($id);

}
