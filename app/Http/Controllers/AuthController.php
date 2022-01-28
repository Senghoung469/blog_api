<?php

namespace App\Http\Controllers;
use App\Api\Auth\AuthService;
use App\Api\Auth\AuthValidate;
use App\Api\ServiceApi\ServiceApi;
use App\Api\User\UserService;
use App\ApiHelper\ApiHelper;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected AuthService $authService;
    protected ServiceApi $serviceApi;
    protected UserService $userService;
    public function __construct(AuthService $authService, UserService $userService,
                                ServiceApi $serviceApi, AuthValidate $authValidate)
    {
        $this->authService = $authService;
        $this->userService = $userService;
        $this->serviceApi = $serviceApi;
    }
    public function register(Request $request)
    {
        try
        {
            return $this->authService->register($request->all());

        }catch (Exception $exception)
        {
            echo $exception->getMessage();
        }
    }
}
