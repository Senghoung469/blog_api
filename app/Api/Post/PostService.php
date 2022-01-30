<?php

namespace App\Api\Post;

interface PostService
{
    public function getPost($id);
    public function getAllPost();
    public function createPost(array $data);
    public function updatePost($id, array $data);
    public function deletePost($id);
}
