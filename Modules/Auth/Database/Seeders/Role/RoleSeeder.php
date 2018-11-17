<?php

namespace Modules\Auth\Database\Seeders\Role;

use Illuminate\Database\Seeder;
use Modules\Auth\Entities\Role;
use Modules\Auth\Repositories\RoleRepository;

class RoleSeeder extends Seeder
{
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }

    public function run()
    {
        if (!$this->command->confirm('Reset Roles?')) {
            return;
        }

        truncate_entity(Role::class);

        $this->roleRepository->create([
            'name' => 'Admin',
            'permissions' => [
                'content.page.all' => true,
                'news.post-category.all' => true,
                'news.post.all' => true,
                'auth.role.all' => false,
                'seo.seo-profile.all' => true,
                'settings.setting.all' => true,
                'auth.user.all' => false,
                'content.page.create' => true,
                'news.post-category.create' => true,
                'news.post.create' => true,
                'auth.role.create' => false,
                'auth.user.create' => true,
                'content.page.delete' => true,
                'news.post-category.delete' => true,
                'news.post.delete' => true,
                'auth.role.delete' => false,
                'auth.user.delete' => true,
                'content.page.edit' => true,
                'news.post-category.edit' => true,
                'news.post.edit' => true,
                'auth.role.edit' => false,
                'seo.seo-profile.edit' => true,
                'settings.setting.edit' => true,
                'auth.user.edit' => true,
                'auth.user.impersonate' => false,
                'audit.audit-log.list' => false,
                'content.page.list' => true,
                'news.post-category.list' => true,
                'news.post.list' => true,
                'auth.role.list' => true,
                'auth.user.list' => true,
                'settings.maintenance-access' => true,
                'content.page.mark-as-draft' => true,
                'news.post.mark-as-draft' => true,
                'content.page.mark-as-live' => true,
                'news.post.mark-as-live' => true,
                'content.page.preview' => true,
                'news.post.preview' => true,
                'audit.audit-log.show' => false
            ]
        ]);
    }
}
