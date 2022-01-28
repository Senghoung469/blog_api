<?php
namespace App\Api\Auth;

use Illuminate\Support\Facades\Validator;

class AuthValidate
{
    public static array $REGISTER_RULES = [
        'name' => 'required|string|max:255',
        'email' => 'required|max:255|email|unique:users',
        'password' => 'required|string|max:255|min:6',
    ];
    public static array $LOGIN_RULES = [
        'email' => 'required|max:255|email',
        'password' => 'required|string|max:255|min:6',
    ];
    public function register($data)
    {
        $authValidate = Validator::make($data, self::$REGISTER_RULES);
        if($authValidate->fails())
        {
            echo $authValidate->errors();
            die();
        }
    }
    public function login($data)
    {
        $authValidate = Validator::make($data, self::$LOGIN_RULES);
        if($authValidate->fails())
        {
            echo $authValidate->errors();
            die();
        }
    }
}
