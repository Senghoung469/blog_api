<?php
namespace App\Api\Post;
class PostServiceImp implements PostService
{
    protected PostRepository $postRepository;
    protected PostValidate $postValidate;
    public function __construct(PostRepository $postRepository, PostValidate $postValidate)
    {
        $this->postRepository = $postRepository;
        $this->postValidate = $postValidate;
    }
    public function getPost($id)
    {
        return $this->postRepository->getPost($id);
    }
    public function getAllPost()
    {
        return $this->postRepository->getAllPost();
    }
    public function createPost(array $data)
    {
        $this->postValidate->create($data);
        return $this->postRepository->createPost($data);
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
