<?php

namespace Modules\News\Policies;

use Modules\Auth\Entities\User;
use Modules\Core\Enums\Status;
use Modules\Core\Services\Policy;
use Modules\News\Entities\Post;

class PostPolicy extends Policy
{
    protected $prefix = 'news.post';

    public function markAsLive(User $user, Post $post): bool
    {
        if ($post->status->key !== Status::DRAFT) {
            return false;
        }

        if ($this->all($user)) {
            return true;
        }

        return $user->hasAccess('news.post.mark-as-live');
    }

    public function markAsDraft(User $user, Post $post): bool
    {
        if ($post->status->key !== Status::LIVE) {
            return false;
        }

        if ($this->all($user)) {
            return true;
        }

        return $user->hasAccess('news.post.mark-as-draft');
    }

    public function preview(User $user, Post $post): bool
    {
        if ($post->status->key !== Status::DRAFT) {
            return false;
        }

        if ($this->all($user)) {
            return true;
        }

        return $user->hasAccess('news.post.preview');
    }

    public function show(User $user, Post $post): bool
    {
        return $post->status->key === Status::LIVE;
    }
}
