<?php
namespace App\Http\Controllers;
use App\Api\Tag\TagService;
use App\ApiHelper\ApiHelper;
use Illuminate\Http\Request;
class TagController extends Controller
{
    protected TagService $tagService;
    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
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
        return $this->tagService->createTag($request->all());
    }
    public function updateTag($id, Request $request)
    {
        return $this->tagService->updateTag($id, $request->all());
    }
    public function deleteTag($id): \Illuminate\Http\JsonResponse
    {
        $this->tagService->deleteTag($id);
        return ApiHelper::responseDelJson();
    }
}
