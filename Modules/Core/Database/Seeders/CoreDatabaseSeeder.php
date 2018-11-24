<?php

namespace Modules\Core\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CoreDatabaseSeeder extends Seeder
{
    public function run()
    {
        unguard_entities();
        disable_foreign_key_checks();

        // $this->call(Seeder::class);
    }
}
