<?php

namespace App\Api\User;
use App\ApiHelper\ApiHelper;
use Illuminate\Support\Facades\Validator;
class UserValidate
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public static array $CREATE_RULES = [
        'name' => 'required|string|max:255',
        'email' => 'required|max:255|email|unique:users',
        'password' => 'required|string|max:255|min:6',
    ];
    public function create($data)
    {
        $userValidate = Validator::make($data, self::$CREATE_RULES);
        if($userValidate->fails())
        {
            echo $userValidate->errors();
            die();
        }
    }
    public function update($id, $data)
    {
        $user = $this->userRepository->getUser($id);
        $CREATE_RULES = [
            'name' => 'string|min:2',
            'password' => 'string|max:255|min:6',
            'email' => 'max:255|email|unique:users,email,' . $id,
        ];
        $userValidate = Validator::make($data, $CREATE_RULES);
        if (is_null($user)) {
            throw new \Illuminate\Database\RecordsNotFoundException();
        }
        if($userValidate->fails())
        {
            echo $userValidate->errors();
            die();
        }
    }
}
