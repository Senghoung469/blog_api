<?php
namespace App\Api\Post;
use Illuminate\Support\Facades\Validator;
class PostValidate
{
    protected PostRepository $postRepository;
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    public static array $CREATE_RULES = [
        'user_id' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'thumbnail' => 'required',
        'tag_id' => 'required|string|max:255',
        'content' => 'required|string|max:255',
        'status' => 'required|string|max:2',
    ];
    public function create($data)
    {
        $postValidate = Validator::make($data, self::$CREATE_RULES);
        if($postValidate->fails())
        {
            echo $postValidate->errors();
            die();
        }
    }
    public function update($id, $data)
    {
        $post = $this->postRepository->getPost($id);
        $CREATE_RULES = [
            'user_id' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'thumbnail' => 'required|string|min:255',
            'tag_id' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'status' => 'required|string|max:2',
        ];
        $postValidate = Validator::make($data, $CREATE_RULES);
        if (is_null($post)) {
            throw new \Illuminate\Database\RecordsNotFoundException();
        }
        if($postValidate->fails())
        {
            echo $postValidate->errors();
            die();
        }
    }
    public function delete($id)
    {

    }
}
