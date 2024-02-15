<?php

namespace App\Services;

use App\Helpers\PayloadHelper;
use App\Models\Tag;
use App\Repositories\TagRepository;
use Illuminate\Http\Request;

class TagService
{
    use PayloadHelper;

    protected TagRepository $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function getTagById(string $id)
    {
        return $this->tagRepository->getTagById($id);
    }

    public function getTags(string $numberPage)
    {
        return $this->tagRepository->getTags($numberPage);
    }

    public function createTag(Request $request)
    {
        return $this->tagRepository->createTag($request->all());
    }

    public function updateTag(Request $request, string $id)
    {
        $tag = $this->tagRepository->getTagById($id);
        $data = $this->getPayloadFillable($request->all(), (new Tag())->getFillable());
        return $this->tagRepository->updateTag($data, $tag);
    }

    public function deleteTagById(string $id)
    {
        $tag = $this->tagRepository->getTagById($id);
        return $this->tagRepository->deleteTag($tag);
    }
}
