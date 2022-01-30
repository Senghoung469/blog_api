<?php
namespace App\Http\Controllers;
use App\Api\ServiceApi\ServiceApi;
use Illuminate\Http\Request;
class ServiceController extends Controller
{
    protected ServiceApi $serviceApi;
    public function __construct(ServiceApi $serviceApi)
    {
        $this->serviceApi = $serviceApi;
    }
    public function uploader(Request $request)
    {
        foreach ($request->file() as $key => $part)
        {
            return $this->serviceApi->upload($request->file($key));
        }
    }
}
