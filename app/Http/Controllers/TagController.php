<?php
namespace App\Http\Controllers;
use App\Api\ServiceApi\ServiceApi;
use App\Api\Tag\TagService;
use App\ApiHelper\ApiHelper;
use Illuminate\Http\Request;
class TagController extends Controller
{
    protected TagService $tagService;
    protected ServiceApi $serviceApi;
    public function __construct(TagService $tagService, ServiceApi $serviceApi)
    {
        $this->tagService = $tagService;
        $this->serviceApi = $serviceApi;
    }
    public function index()
    {
        return $this->tagService->getAllTag();
    }
    public function getTagById($id)
    {
        return $this->tagService->getTag($id);
    }
    public function createTag(Request $request)
    {
        $tag = $this->tagService->createTag($request->all());
        return ApiHelper::responseCreateJson($tag);
    }
    public function updateTag($id, Request $request)
    {
        $this->tagService->updateTag($id, $request->all());
    }
    public function deleteTag($id): \Illuminate\Http\JsonResponse
    {
        $this->tagService->deleteTag($id);
        return ApiHelper::responseDelJson();
    }
}
