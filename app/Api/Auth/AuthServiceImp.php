<?php

namespace App\Api\Auth;

use App\ApiHelper\AuditHelper;
use Illuminate\Support\Facades\Hash;
use Exception;

class AuthServiceImp implements AuthService
{
    private AuthValidate $authValidate;
    private AuthRepository $authRepository;
    public function __construct(AuthValidate $authValidate, AuthRepository $authRepository)
    {
        $this->authValidate = $authValidate;
        $this->authRepository = $authRepository;
    }
    public function register($data)
    {
        try {
            $this->authValidate->register($data);
            $saveData = [];
            foreach($data as $key => $value)
            {
                if($key == 'password')
                {
                    $saveData += ["$key" => Hash::make($value)];
                }
                else
                {
                    $saveData += ["$key" => $value];
                }

            }
            $dataWithAudit = AuditHelper::createWithUser($saveData);
            return $this->authRepository->register($dataWithAudit);
        }
        catch (Exception $ex)
        {
            error_log($ex->getMessage());
        }
    }
}
