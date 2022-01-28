<?php
namespace App\Api\ServiceApi;
interface ServiceApi
{
    public function upload($data, array $extensions = null, $sizes = null );
    public function delete($fileName);
    public function serviceLogin($data);
}
