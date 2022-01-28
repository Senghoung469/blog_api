<?php
namespace App\Api\User;
use App\ApiHelper\AuditHelper;
use http\Client\Curl\User;
use Illuminate\Database\RecordsNotFoundException;
use Exception;
use Illuminate\Support\Facades\Hash;
class UserServiceImp implements UserService
{
    protected UserRepository $userRepository;
    protected UserValidate $userValidate;
    public function __construct(UserRepository $userRepository, UserValidate $userValidate)
    {
        $this->userRepository = $userRepository;
        $this->userValidate = $userValidate;
    }
    public function getUser($id)
    {
        $user = $this->userRepository->getUser($id);
        if(is_null($user))
        {
            throw new RecordsNotFoundException();
        }
        else
        {
            return $user;
        }
    }
    public function getAllUser()
    {
        $users = $this->userRepository->getAllUser();
        if(is_null($users))
        {
            throw new RecordsNotFoundException();
        }
        else
        {
            return $users;
        }
    }
    public function createUser($data)
    {
        try {
            $this->userValidate->create($data);
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
            return $this->userRepository->createUser($dataWithAudit);
        }
        catch (Exception $ex)
        {
            error_log($ex->getMessage());
        }
    }
    public function updateUser($id, $data)
    {
        try {
            $this->userValidate->update($id, $data);
            return $this->userRepository->updateUser($id, $data);
        }catch (Exception $ex){
            error_log($ex->getMessage());
        }
    }
    public function deleteUser($id)
    {
        return $this->userRepository->deleteUser($id);
    }
}
