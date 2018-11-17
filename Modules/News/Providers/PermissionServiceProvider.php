<?php

namespace Modules\News\Providers;

use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Support\ServiceProvider;
use Joshbrw\LaravelPermissions\Permission;
use Joshbrw\LaravelPermissions\Traits\RegistersPermissions;
use Modules\Auth\Services\EntityPermissions;
use Modules\News\Entities\Post;
use Modules\News\Entities\PostCategory;
use Modules\News\Policies\PostCategoryPolicy;
use Modules\News\Policies\PostPolicy;

class PermissionServiceProvider extends ServiceProvider
{
    use RegistersPermissions;

    public function boot(Gate $gate, EntityPermissions $entityPermissions)
    {
        $gate->policy(Post::class, PostPolicy::class);

        $entityPermissions->register('news', 'post', 'posts', [
            'list', 'create', 'edit', 'delete', 'mark-as-live', 'mark-as-draft', 'preview'
        ]);

        $gate->policy(PostCategory::class, PostCategoryPolicy::class);

        $entityPermissions->register('news', 'post-category', 'post-categories', [
            'list', 'create', 'edit', 'delete'
        ]);
    }
}
