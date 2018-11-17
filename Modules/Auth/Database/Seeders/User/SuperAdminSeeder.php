<?php

namespace Modules\Auth\Database\Seeders\User;

use Illuminate\Database\Seeder;
use Modules\Auth\Managers\UserManager;

class SuperAdminSeeder extends Seeder
{
    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function run()
    {
        if (!$this->command->confirm('Create Super Admin')) {
            return;
        }

        $this->userManager->create([
            'first_name' => $this->command->ask('First Name'),
            'last_name' => $this->command->ask('Last Name'),
            'email' => $this->command->ask('Email'),
            'password' => $this->command->secret('Password'),
            'permissions' => ['*' => true]
        ]);
    }
}
