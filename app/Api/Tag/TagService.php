<?php

namespace App\Api\Tag;

interface TagService
{
    public function getTag($id);
    public function getAllTag();
    public function createTag(array $data);
    public function updateTag($id, array $data);
    public function deleteTag($id);
}
