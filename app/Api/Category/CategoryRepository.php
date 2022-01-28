<?php

namespace App\Api\Category;

interface CategoryRepository
{
    public function getCategory($id);
    public function getAllCategory();
    public function createCategory(array $data);
    public function updateCategory($id, array $data);
    public function deleteCategory($id);
}
