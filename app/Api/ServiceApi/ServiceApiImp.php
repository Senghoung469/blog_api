<?php
namespace App\Api\ServiceApi;
use App\Api\Auth\AuthValidate;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class ServiceApiImp implements ServiceApi
{
    protected AuthValidate $authValidate;
    protected $uploadPath;
    protected $uploadSizeLimit;
    public function __construct(AuthValidate $authValidate)
    {
        $this->authValidate = $authValidate;
        $this->uploadPath = config("enum.UPLOAD_PATH");
        $this->uploadSizeLimit = config("enum.UPLOAD_SIZE");
    }
    public function upload($data, array $extensions = null, $sizes = null)
    {
        try {
            $extensionName = Str::lower($data->getClientOriginalExtension());
            $sizeFile = $data->getSize();

            if (!isset($size_limit))
                $size_limit = $this->uploadSizeLimit * 1048576;
            else
                $size_limit = $size_limit * 1048576;

            if (!isset($allow_extensions))
                $allow_extensions = array('gif', 'png', 'jpg', 'jpeg');

            if (!in_array($extensionName, $allow_extensions))
                die("File upload with extension " . $extensionName . " not support");

            if ($sizeFile > $size_limit)
                die("Files must be less than " . $this->uploadSizeLimit . "MB");
            $fileName = Str::uuid() . '.' . $extensionName;
            $file = file($data->path());
            Storage::disk('public')->put($this->uploadPath . '/' . $fileName, $file);
            die($fileName);

        } catch (Exception $ex) {
            error_log($ex->getMessage());
        }
    }
    public function delete($fileName): bool
    {
        try {
            return Storage::disk('public')->delete($this->uploadPath . '/' . $fileName);
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
    public function serviceLogin($data)
    {
        $this->authValidate->login($data);
    }
}
