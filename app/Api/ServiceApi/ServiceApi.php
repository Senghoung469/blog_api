<?php
namespace App\Api\ServiceApi;
use App\Api\Auth\AuthValidate;
class ServiceApi
{
    protected AuthValidate $authValidate;
    public function __construct(AuthValidate $authValidate)
    {
        $this->authValidate = $authValidate;
    }

    public function serviceLogin($data)
    {
        $this->authValidate->login($data);
    }
}
