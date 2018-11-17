<?php

namespace Modules\Content\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use Modules\Content\Entities\Page;
use Modules\Content\Repositories\PageRepository;

class StatusController extends Controller
{
    private $pageRepository;

    public function __construct(PageRepository $pageRepository)
    {
        $this->pageRepository = $pageRepository;
    }

    public function markAsLive(Page $page)
    {
        authorize('mark-as-live', $page);

        if (!$this->pageRepository->markAsLive($page)) {
            return redirect()->back()
                ->with('error', trans_error('messages.error.entity-updated', ['entity' => 'Page']));
        }

        return redirect()->back()
            ->with('success', trans('messages.success.entity-updated', ['entity' => 'Page']));
    }

    public function markAsDraft(Page $page)
    {
        authorize('mark-as-draft', $page);

        if (!$this->pageRepository->markAsDraft($page)) {
            return redirect()->back()
                ->with('error', trans_error('messages.error.entity-updated', ['entity' => 'page']));
        }

        return redirect()->back()
            ->with('success', trans('messages.success.entity-updated', ['entity' => 'Page']));
    }
}
