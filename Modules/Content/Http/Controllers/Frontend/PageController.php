<?php

namespace Modules\Content\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use Illuminate\View\View;
use Modules\Content\Entities\Page;
use Modules\Content\Repositories\PageRepository;
use Modules\Seo\Repositories\SeoProfileRepository;

class PageController extends Controller
{
    private $pageRepository;
    private $seoProfileRepository;

    public function __construct(PageRepository $pageRepository, SeoProfileRepository $seoProfileRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->seoProfileRepository =$seoProfileRepository;
    }

    public function show(Request $request, string $slug): View
    {
        if ($request->get('preview') !== 'true') {
            return $this->render(
                $this->pageRepository->findOrFailBySlugWhereLive($slug)
            );
        }

        $page = $this->pageRepository->findOrFailBySlug($slug);

        authorize('preview', $page);

        return $this->render($page);
    }

    private function render(Page $page): View
    {
        if (view()->exists("content::frontend.page-template.{$page->template->key}")) {
            return view("content::frontend.page-template.{$page->template->key}", [
                'page' => $page,
                'seoProfile' => $this->seoProfileRepository->findOrNew($page)
            ]);
        }

        abort(404);
    }
}
