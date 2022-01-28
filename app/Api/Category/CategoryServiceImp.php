<?php
namespace App\Api\Category;
class CategoryServiceImp implements CategoryService
{
    protected CategoryRepository $categoryRepository;
    protected CategoryValidate $categoryValidate;
    public function __construct(CategoryRepository $categoryRepository, CategoryValidate $categoryValidate)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryValidate = $categoryValidate;
    }
    public function getCategory($id)
    {
        return $this->categoryRepository->getCategory($id);
    }
    public function getAllCategory()
    {
        return $this->categoryRepository->getAllCategory();
    }
    public function createCategory($data)
    {
        $this->categoryValidate->create($data);
        return $this->categoryRepository->createCategory($data);
    }
    public function updateCategory($id, $data)
    {
        $this->categoryValidate->update($id, $data);
        return $this->categoryRepository->updateCategory($id, $data);
    }
    public function deleteCategory($id)
    {
        $this->categoryValidate->delete($id);
        return $this->categoryRepository->deleteCategory($id);
    }
}
