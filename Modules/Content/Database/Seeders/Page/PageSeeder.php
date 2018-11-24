<?php

namespace Modules\Content\Database\Seeders\Page;

use Illuminate\Database\Seeder;
use Modules\Content\Entities\Page;
use Modules\Content\Repositories\PageRepository;

class PageSeeder extends Seeder
{
    private $pageRepository;

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function run()
    {
        /** @var array $pages */
        $pages = factory(Page::class, (int) $this->command->ask('Number of Pages', 0))->raw();

        foreach ($pages as $page) {
            $this->pageRepository->create($page);
        }
    }
}
