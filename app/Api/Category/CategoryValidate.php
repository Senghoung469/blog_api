<?php

namespace App\Api\Category;
use App\ApiHelper\ApiHelper;
use Illuminate\Support\Facades\Validator;
class CategoryValidate
{
    protected CategoryRepository $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public static array $CREATE_RULES = [
        'name' => 'required|string|max:255',
        'description' => 'max:255'
    ];
    public function create($data)
    {
        $categoryValidate = Validator::make($data, self::$CREATE_RULES);
        if($categoryValidate->fails())
        {
            echo $categoryValidate->errors();
            die();
        }
    }
    public function update($id, $data)
    {
        $category = $this->categoryRepository->getCategory($id);
        $CREATE_RULES = [
            'name' => 'required|string|max:255',
            'description' => 'max:255'
        ];
        $categoryValidate = Validator::make($data, $CREATE_RULES);
        if (is_null($category)) {
            throw new \Illuminate\Database\RecordsNotFoundException();
        }
        if($categoryValidate->fails())
        {
            echo $categoryValidate->errors();
            die();
        }
    }
    public function delete($id)
    {
        $category = $this->categoryRepository->getCategory($id);
        if(is_null($category))
        {
            throw new \Illuminate\Database\RecordsNotFoundException();
        }
    }
}

