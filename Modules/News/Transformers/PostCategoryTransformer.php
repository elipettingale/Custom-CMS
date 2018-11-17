<?php

namespace Modules\News\Transformers;

use EliPett\EntityTransformer\Contracts\EntityTransformer;
use Modules\News\Entities\PostCategory;

class PostCategoryTransformer implements EntityTransformer
{
    /**
     * @param PostCategory $postCategory
     * @return array
     */
    public function data($postCategory): array
    {
        return [
            'id' => $postCategory->id,
            'name' => $postCategory->name,
            'created_at' => $postCategory->created_at->toDateTimeString()
        ];
    }

    public function relations(): array
    {
        return [
            'posts' => PostTransformer::class
        ];
    }
}
