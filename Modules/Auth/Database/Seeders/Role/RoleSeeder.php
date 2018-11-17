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
                'settings.maintenance-access' => true,
                'content.page.manage' => true,
                'news.post-category.manage' => true,
                'news.post.manage' => true,
                'settings.setting.manage' => true,
                'auth.user.manage' => true,
            ]
        ]);
    }
}
