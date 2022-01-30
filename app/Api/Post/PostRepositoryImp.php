<?php
namespace App\Api\Post;
use App\Models\PostModel;

class PostRepositoryImp implements PostRepository
{
    protected PostModel $postModel;
    public function __construct(PostModel $postModel)
    {
        $this->postModel = $postModel;
    }

    public function getPost($id)
    {
       return $this->postModel::find($id);
    }
    public function getAllPost()
    {
       return $this->postModel::paginate();
    }
    public function createPost(array $data)
    {
       return $this->postModel::create($data);
    }
    public function updatePost($id, array $data)
    {
        // TODO: Implement updatePost() method.
    }
    public function deletePost($id)
    {
        // TODO: Implement deletePost() method.
    }
}
