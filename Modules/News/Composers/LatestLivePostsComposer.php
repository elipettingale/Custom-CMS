<?php

namespace Modules\News\Composers;

use Modules\Core\Enums\Modules;
use Illuminate\View\View;
use Modules\News\Entities\Post;
use Modules\News\Repositories\PostRepository;

class LatestLivePostsComposer
{
    public const CACHE_KEY = 'latest-live-posts';

    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @param \Illuminate\View\View $view
     * @throws \Exception
     */
    public function compose(View $view): void
    {
        $latestLivePosts = cache()->tags([Post::class])->rememberForever(self::CACHE_KEY, function() {
            return $this->postRepository->getLatestWhereLive(5);
        });

        $view->with('latestLivePosts', $latestLivePosts);
    }
}
