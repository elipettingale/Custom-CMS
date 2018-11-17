<?php

namespace Modules\Content\Database\Seeders\Page;

use Illuminate\Database\Seeder;
use Modules\Content\Entities\Page;
use Modules\Content\Repositories\PageRepository;

class PageSeeder extends Seeder
{
    private $postRepository;

    public function __construct(PageRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function run()
    {
        /** @var array $pages */
        $pages = factory(Page::class, (int) $this->command->ask('Number of Pages', 0))->raw();

        foreach ($pages as $page) {
            $this->postRepository->create($page);
        }
    }
}
