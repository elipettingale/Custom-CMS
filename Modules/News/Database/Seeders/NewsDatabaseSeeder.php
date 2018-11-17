<?php

namespace Modules\News\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\News\Database\Seeders\Post\PostSeeder;
use Modules\News\Database\Seeders\PostCategory\PostCategorySeeder;

class NewsDatabaseSeeder extends Seeder
{
    public function run()
    {
        unguard_entities();
        disable_foreign_key_checks();

        $this->call(PostCategorySeeder::class);
        $this->call(PostSeeder::class);
    }
}
