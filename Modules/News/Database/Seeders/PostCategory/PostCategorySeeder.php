<?php

namespace Modules\News\Database\Seeders\PostCategory;

use Illuminate\Database\Seeder;
use Modules\News\Entities\PostCategory;
use Modules\News\Repositories\PostCategoryRepository;

class PostCategorySeeder extends Seeder
{
    private $postCategoryRepository;

    public function __construct(PostCategoryRepository $postCategoryRepository)
    {
        $this->postCategoryRepository = $postCategoryRepository;
    }

    public function run()
    {
        /** @var array $postCategories */
        $postCategories = factory(PostCategory::class, (int) $this->command->ask('Number of Post Categories', 0))->raw();

        foreach ($postCategories as $postCategory) {
            $this->postCategoryRepository->create($postCategory);
        }
    }
}
