<?php

namespace Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Modules\News\Repositories\PostCategoryRepository;
use Modules\News\Repositories\PostRepository;

class PostCategoryController extends Controller
{
    private $categoryRepository;
    private $postRepository;

    public function __construct(PostCategoryRepository $categoryRepository, PostRepository $postRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->postRepository = $postRepository;
    }

    public function show(string $slug)
    {
        $category = $this->categoryRepository->findOrFailBySlug($slug);

        return view('news::frontend.post-category.show', [
            'category' => $category,
            'posts' => $this->postRepository->getFrontendCategoryListing($category)
        ]);
    }
}
