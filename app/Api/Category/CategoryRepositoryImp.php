<?php

namespace App\Api\Category;
use App\ApiHelper\ApiHelper;
use App\Models\CategoryModel;

class CategoryRepositoryImp implements CategoryRepository
{
    protected CategoryModel $categoryModel;
    public function __construct(CategoryModel $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }
    public function getCategory($id)
    {
        return $this->categoryModel::find($id);
    }
    public function getAllCategory()
    {
        return $this->categoryModel::paginate();
    }
    public function createCategory($data)
    {
        return $this->categoryModel::create($data);
    }
    public function updateCategory($id, $data)
    {
        $category = $this->categoryModel::find($id);
        return $category->update($data);
    }
    public function deleteCategory($id)
    {
        $this->categoryModel::destroy($id);
        return ApiHelper::responseDelJson();
    }
}
