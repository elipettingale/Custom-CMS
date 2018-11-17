<?php

namespace Modules\News\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\News\Entities\PostCategory;
use Modules\News\Http\Requests\Admin\PostCategory\StorePostCategoryRequest;
use Modules\News\Http\Requests\Admin\PostCategory\UpdatePostCategoryRequest;
use Modules\News\Repositories\PostCategoryRepository;

class PostCategoryController extends Controller
{
    private $postCategoryRepository;

    public function __construct(PostCategoryRepository $postCategoryRepository)
    {
        $this->postCategoryRepository = $postCategoryRepository;

        register_breadcrumb('News', null);
        register_breadcrumb('Categories', route('admin.post-categories.index'));
    }

    public function index(): View
    {
        authorize('list', PostCategory::class);

        return view('news::admin.post-category.index', [
            'postCategories' => $this->postCategoryRepository->getAdminListing()
        ]);
    }

    public function create(): View
    {
        authorize('create', PostCategory::class);

        register_breadcrumb('Create New Category', route('admin.post-categories.create'));

        return view('news::admin.post-category.create', [
            'postCategory' => $this->postCategoryRepository->createNewInstance()
        ]);
    }

    public function store(StorePostCategoryRequest $request): RedirectResponse
    {
        authorize('create', PostCategory::class);

        if (!$postCategory = $this->postCategoryRepository->create($request->all())) {
            return redirect()->back()
                ->with('error', trans_error('messages.error.entity-created', ['entity' => 'Category']));
        }

        return redirect()->route('admin.post-categories.edit', $postCategory->id)
            ->with('success', trans('messages.success.entity-created', ['entity' => 'Category']));
    }

    public function edit(PostCategory $postCategory): View
    {
        authorize('edit', $postCategory);

        register_breadcrumb("Edit Category: {$postCategory->name}", route('admin.post-categories.edit', $postCategory->id));

        return view('news::admin.post-category.edit', [
            'postCategory' => $postCategory
        ]);
    }

    public function update(PostCategory $postCategory, UpdatePostCategoryRequest $request): RedirectResponse
    {
        authorize('edit', $postCategory);

        if (!$this->postCategoryRepository->update($postCategory, $request->all())) {
            return redirect()->back()
                ->with('error', trans_error('messages.error.entity-updated', ['entity' => 'Category']));
        }

        return redirect()->back()
            ->with('success', trans('messages.success.entity-updated', ['entity' => 'Category']));
    }

    public function destroy(PostCategory $postCategory): RedirectResponse
    {
        authorize('delete', $postCategory);

        if (!$this->postCategoryRepository->delete($postCategory)) {
            return redirect()->back()
                ->with('error', trans_error('messages.success.entity-deleted', ['entity' => 'Category']));
        }

        return redirect()->back()
            ->with('success', trans('messages.success.entity-deleted', ['entity' => 'Category']));
    }
}
