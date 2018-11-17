<?php

namespace Modules\News\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use Illuminate\View\View;
use Modules\News\Entities\Post;
use Modules\News\Repositories\PostRepository;
use Modules\Seo\Repositories\SeoProfileRepository;

class PostController extends Controller
{
    private $postRepository;
    private $seoProfileRepository;

    public function __construct(PostRepository $postRepository, SeoProfileRepository $seoProfileRepository)
    {
        $this->postRepository = $postRepository;
        $this->seoProfileRepository = $seoProfileRepository;
    }

    public function index(): View
    {
        return view('news::frontend.post.index', [
            'posts' => $this->postRepository->getFrontendListing()
        ]);
    }

    public function show(Request $request, string $slug): View
    {
        if ($request->get('preview') !== 'true') {
            return $this->render(
                $this->postRepository->findOrFailBySlugWhereLive($slug)
            );
        }

        $post = $this->postRepository->findOrFailBySlug($slug);

        authorize('preview', $post);

        return $this->render($post);
    }

    private function render(Post $post): View
    {
        return view('news::frontend.post.show', [
            'post' => $post,
            'seoProfile' => $this->seoProfileRepository->findOrNew($post)
        ]);
    }
}
