<?php
namespace App\Http\Controllers;
use App\ApiHelper\ApiHelper;
use Illuminate\Http\Request;
use App\Api\User\UserService;

class UserController extends Controller
{
    protected UserService $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function index()
    {
        return $this->userService->getAllUser();
    }
    public function createUser(Request $request)
    {
        return $this->userService->createUser($request->all());
    }
    public function getUserById($id): \Illuminate\Http\JsonResponse
    {
       return ApiHelper::responseSuccessWithData('Get data user successfully', $this->userService->getUser($id));
    }
    public function updateUser($id, Request $request): \Illuminate\Http\JsonResponse
    {
        $user = $this->userService->updateUser($id, $request->all());
        return ApiHelper::responseUpdateJson($user);
    }
    public function deleteUser($id): \Illuminate\Http\JsonResponse
    {
        $this->userService->deleteUser($id);
        return ApiHelper::responseDelJson();
    }
}
