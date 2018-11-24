<?php

namespace Modules\News\Composers;

use Illuminate\View\View;
use Modules\News\Entities\PostCategory;
use Modules\News\Repositories\PostCategoryRepository;

class PostCategoriesComposer
{
    public const CACHE_KEY = 'post-categories';

    private $postCategoryRepository;

    public function __construct(PostCategoryRepository $postCategoryRepository)
    {
        $this->postCategoryRepository = $postCategoryRepository;
    }

    /**
     * @param \Illuminate\View\View $view
     * @throws \Exception
     */
    public function compose(View $view): void
    {
        $postCategories = cache()->tags([PostCategory::class])->rememberForever(self::CACHE_KEY, function() {
            return $this->postCategoryRepository->getAll();
        });

        $view->with('postCategories', $postCategories);
    }
}
