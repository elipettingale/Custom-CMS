<?php

namespace Modules\Content\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Core\Repositories\StatusRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\Content\Entities\Page;
use Modules\Content\Http\Requests\Admin\Page\StorePageRequest;
use Modules\Content\Http\Requests\Admin\Page\UpdatePageRequest;
use Modules\Content\Repositories\PageRepository;
use Modules\Content\Repositories\PageTemplateRepository;
use Modules\Content\Validators\Page\MarkAsLivePageValidator;

class PageController extends Controller
{
    private $pageRepository;
    private $templateRepository;
    private $statusRepository;

    public function __construct(PageRepository $pageRepository, PageTemplateRepository $templateRepository, StatusRepository $statusRepository)
    {
        $this->pageRepository = $pageRepository;
        $this->templateRepository = $templateRepository;
        $this->statusRepository = $statusRepository;

        register_breadcrumb('Content', null);
        register_breadcrumb('Pages', route('admin.pages.index'));
    }

    public function index(): View
    {
        authorize('list', Page::class);

        return view('content::admin.page.index', [
            'pages' => $this->pageRepository->getAdminListing(),
            'statuses' => $this->statusRepository->getAll()
        ]);
    }

    public function create(): View
    {
        authorize('create', Page::class);

        register_breadcrumb('Create New Page', route('admin.pages.create'));

        return view('content::admin.page.create', [
            'page' => $this->pageRepository->createNewInstance(),
            'templates' => $this->templateRepository->getAll()
        ]);
    }

    public function store(StorePageRequest $request): RedirectResponse
    {
        authorize('create', Page::class);

        if (!$page = $this->pageRepository->create($request->all())) {
            return redirect()->back()
                ->with('error', trans('messages.error.entity-created', ['entity' => 'Page']));
        }

        return redirect()->route('admin.pages.edit', $page->id)
            ->with('success', trans('messages.success.entity-created', ['entity' => 'Page']));
    }

    public function edit(Page $page): View
    {
        authorize('edit', $page);

        register_breadcrumb("Edit Page: {$page->title}", route('admin.pages.edit', $page->id));

        return view('content::admin.page.edit', [
            'page' => $page,
            'templates' => $this->templateRepository->getAll(),
            'markAsLiveValidator' => new MarkAsLivePageValidator($page)
        ]);
    }

    public function update(Page $page, UpdatePageRequest $request): RedirectResponse
    {
        authorize('edit', $page);

        if (!$this->pageRepository->update($page, $request->all())) {
            return redirect()->back()
                ->with('error', trans('messages.error.entity-updated', ['entity' => 'Page']));
        }

        return redirect()->back()
            ->with('success', trans('messages.success.entity-updated', ['entity' => 'Page']));
    }

    public function destroy(Page $page): RedirectResponse
    {
        authorize('delete', $page);

        if (!$this->pageRepository->delete($page)) {
            return redirect()->back()
                ->with('error', trans('messages.error.entity-deleted', ['entity' => 'Page']));
        }

        return redirect()->back()
            ->with('success', trans('messages.success.entity-deleted', ['entity' => 'Page']));
    }
}
