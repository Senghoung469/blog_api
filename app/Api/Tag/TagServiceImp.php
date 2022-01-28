<?php
namespace App\Api\Tag;
use App\ApiHelper\ApiHelper;

class TagServiceImp implements TagService
{
    protected TagRepository $tagRepository;
    protected TagValidate $tagValidate;
    public function __construct(TagRepository $tagRepository, TagValidate $tagValidate)
    {
        $this->tagRepository = $tagRepository;
        $this->tagValidate = $tagValidate;
    }
    public function getTag($id)
    {
        return $this->tagRepository->getTag($id);
    }
    public function getAllTag()
    {
        return $this->tagRepository->getAllTag();
    }
    public function createTag(array $data)
    {
        $this->tagValidate->create($data);
        return $this->tagRepository->createTag($data);
    }
    public function updateTag($id, array $data)
    {
        $this->tagValidate->update($id, $data);
        return $this->tagRepository->updateTag($id, $data);
    }
    public function deleteTag($id): \Illuminate\Http\JsonResponse
    {
        $this->tagValidate->delete($id);
        $this->tagRepository->deleteTag($id);
        return ApiHelper::responseDelJson();
    }
}
