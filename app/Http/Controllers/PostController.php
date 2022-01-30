<?php
namespace App\Http\Controllers;
use App\Api\Post\PostService;
use Illuminate\Http\Request;
class PostController extends Controller
{
    protected PostService $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    public function index()
    {
        return $this->postService->getAllPost();
    }
    public function getPostById($id)
    {
        return $this->postService->getPost($id);
    }
    public function createPost(Request $request)
    {
        $postObj = [
            'user_id' => $request->post('user_id'),
            'title' => $request->post('title'),
            'description' => $request->post('description'),
            'thumbnail' => $request->file('thumbnail'),
            'tag_id' => $request->post('tag_id'),
            'content' => $request->post('content'),
            'status' => $request->post('status'),
        ];
        return $this->postService->createPost($postObj);
    }
}
