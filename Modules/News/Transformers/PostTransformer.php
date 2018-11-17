<?php

namespace Modules\News\Transformers;

use EliPett\EntityTransformer\Contracts\EntityTransformer;
use Modules\News\Entities\Post;

class PostTransformer implements EntityTransformer
{
    /**
     * @param Post $post
     * @return array
     */
    public function data($post): array
    {
        return [
            'id' => $post->id,
            'title' => $post->title,
            'status' => $post->status->key,
            'slug' => $post->slug,
            'content' => $post->content,
            'created_at' => $post->created_at->toDateTimeString(),
            'published_at' => $post->published_at->toDateTimeString()
        ];
    }

    public function relations(): array
    {
        return [
            'category' => PostCategoryTransformer::class
        ];
    }
}
