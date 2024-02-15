<?php

namespace App\Repositories;

use App\Models\Tag;

class TagRepository {

    protected Tag $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function getTagById(string $id)
    {
        return $this->tag->find($id);
    }

    public function getTags(string $numberPage)
    {
        return $this->tag->paginate($numberPage);
    }

    public function createTag(array $data)
    {
        return $this->tag->create($data);
    }

    public function updateTag(array $data, Tag $tag)
    {
        return $tag->update($data);
    }

    public function deleteTag(Tag $tag) 
    {
        return $tag->delete();
    }
}