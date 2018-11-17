<?php

namespace Modules\Content\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Content\Database\Seeders\Page\PageSeeder;

class ContentDatabaseSeeder extends Seeder
{
    public function run()
    {
        unguard_entities();
        disable_foreign_key_checks();

        $this->call(PageSeeder::class);
    }
}
