<?php

namespace App\Http\Controllers;
use App\Api\Category\CategoryService;
use App\ApiHelper\ApiHelper;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected CategoryService $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    public function index()
    {
        return $this->categoryService->getAllCategory();
    }
    public function getCategoryById($id)
    {
        return $this->categoryService->getCategory($id);
    }
    public function createCategory(Request $request)
    {
        $category = $this->categoryService->createCategory($request->all());
        return ApiHelper::responseCreateJson($category);
    }
    public function updateCategory(Request $request, $id)
    {
        $category = $this->categoryService->updateCategory($id, $request->all());
         return ApiHelper::responseUpdateJson($category);
    }
    public function deleteCategory($id)
    {
        return $this->categoryService->deleteCategory($id);
    }
}
