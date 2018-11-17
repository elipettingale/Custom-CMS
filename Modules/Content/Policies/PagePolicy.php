<?php

namespace Modules\Content\Policies;

use Modules\Auth\Entities\User;
use Modules\Content\Entities\Page;
use Modules\Core\Enums\Status;
use Modules\Core\Services\Policy;

class PagePolicy extends Policy
{
    protected $prefix = 'content.page';

    public function markAsLive(User $user, Page $page): bool
    {
        if ($page->status->key !== Status::DRAFT) {
            return false;
        }

        if ($this->all($user)) {
            return true;
        }

        return $user->hasAccess('content.page.mark-as-live');
    }

    public function markAsDraft(User $user, Page $page): bool
    {
        if ($page->status->key !== Status::LIVE) {
            return false;
        }

        if ($this->all($user)) {
            return true;
        }

        return $user->hasAccess('content.page.mark-as-draft');
    }

    public function preview(User $user, Page $page): bool
    {
        if ($page->status->key !== Status::DRAFT) {
            return false;
        }

        if ($this->all($user)) {
            return true;
        }

        return $user->hasAccess('content.page.preview');
    }

    public function show(User $user, Page $page): bool
    {
        return $page->status->key === Status::LIVE;
    }
}
