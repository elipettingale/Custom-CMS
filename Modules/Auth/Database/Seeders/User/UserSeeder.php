<?php

namespace Modules\Auth\Database\Seeders\User;

use Illuminate\Database\Seeder;
use Modules\Auth\Entities\User;
use Modules\Auth\Managers\UserManager;

class UserSeeder extends Seeder
{
    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function run()
    {
        /** @var array $users */
        $users = factory(User::class, (int) $this->command->ask('Number of Users', 0))->raw();

        foreach ($users as $user) {
            $this->userManager->create($user);
        }
    }
}
