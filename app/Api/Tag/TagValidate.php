<?php
namespace App\Api\Tag;
use Illuminate\Support\Facades\Validator;
class TagValidate
{
    protected TagRepository $tagRepository;
    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }
    public static array $CREATE_RULES = [
        'name' => 'required|string|max:255'
    ];
    public function create($data)
    {
        $tagValidate = Validator::make($data, self::$CREATE_RULES);
        if($tagValidate->fails())
        {
            echo $tagValidate->errors();
            die();
        }
    }
    public function update($id, $data)
    {
        $tag = $this->tagRepository->getTag($id);
        $CREATE_RULES = [
            'name' => 'required|string|max:255'
        ];
        $tagValidate = Validator::make($data, $CREATE_RULES);
        if (is_null($tag)) {
            throw new \Illuminate\Database\RecordsNotFoundException();
        }
        if($tagValidate->fails())
        {
            echo $tagValidate->errors();
            die();
        }
    }
    public function delete($id)
    {
        $tag = $this->tagRepository->getTag($id);
        if(is_null($tag))
        {
            throw new \Illuminate\Database\RecordsNotFoundException();
        }
    }
}
