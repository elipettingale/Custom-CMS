<?php

namespace Modules\Content\Database\Seeders\Page;

use Illuminate\Database\Seeder;
use Modules\Content\Repositories\PageRepository;

class HomePageSeeder extends Seeder
{
    private $pageRepository;

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function run()
    {
        if (!$this->command->confirm('Reset Home Page?')) {
            return;
        }

        if ($post = $this->pageRepository->findOrFailBySlug('home')) {
            $this->pageRepository->delete($post);
        }

        $this->pageRepository->create([
            'title' => 'Home',
            'template' => 'basic',
            'data' => [
                'content' => $this->getContent()
            ],
            'status' => 'live'
        ]);
    }

    private function getContent(): string
    {
        return '<p>[hero_slider]<br />[slide]images/stock/9.jpg[/slide]<br />[slide]images/stock/10.jpg[/slide]<br />[slide]images/stock/11.jpg[/slide]<br />[/hero_slider]</p><p>[separator]2rem[/separator]</p><p>[latest_posts]6[/latest_posts]</p>';
    }
}
