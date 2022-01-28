<?php
namespace App\Api\Tag;
use App\Models\TagModel;
class TagRepositoryImp implements TagRepository
{
    protected TagModel $tagModel;
    public function __construct(TagModel $tagModel)
    {
        $this->tagModel = $tagModel;
    }
    public function getTag($id)
    {
        return $this->tagModel::find($id);
    }
    public function getAllTag()
    {
        return $this->tagModel::paginate();
    }
    public function createTag(array $data)
    {
        return $this->tagModel::create($data);
    }
    public function updateTag($id, array $data)
    {
        $tag = $this->tagModel::find($id);
        return $tag->update($data);
    }
    public function deleteTag($id)
    {
        $this->tagModel::destroy($id);
    }
}
