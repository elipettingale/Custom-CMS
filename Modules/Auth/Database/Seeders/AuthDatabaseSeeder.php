<?php

namespace Modules\Auth\Database\Seeders;

use Cartalyst\Sentinel\Activations\IlluminateActivationRepository as ActivationRepository;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Auth\Database\Seeders\Role\RoleSeeder;
use Modules\Auth\Database\Seeders\User\SuperAdminSeeder;
use Modules\Auth\Database\Seeders\User\UserSeeder;
use Modules\Auth\Entities\User;
use Modules\Auth\Managers\UserManager;
use Modules\Auth\Repositories\UserRepository;

class AuthDatabaseSeeder extends Seeder
{
    public function run()
    {
        unguard_entities();
        disable_foreign_key_checks();

        $this->call(SuperAdminSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
    }
}
