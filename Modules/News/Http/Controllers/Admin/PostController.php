<?php

namespace Modules\News\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Core\Repositories\StatusRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\News\Entities\Post;
use Modules\News\Http\Requests\Admin\Post\StorePostRequest;
use Modules\News\Http\Requests\Admin\Post\UpdatePostRequest;
use Modules\News\Repositories\PostCategoryRepository;
use Modules\News\Repositories\PostRepository;
use Modules\News\Validators\Post\MarkAsLivePostValidator;

class PostController extends Controller
{
    private $postRepository;
    private $categoryRepository;
    private $statusRepository;

    public function __construct(PostRepository $postRepository, PostCategoryRepository $categoryRepository, StatusRepository $statusRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->statusRepository = $statusRepository;

        register_breadcrumb('News', null);
        register_breadcrumb('Posts', route('admin.posts.index'));
    }

    public function index(): View
    {
        authorize('list', Post::class);

        return view('news::admin.post.index', [
            'posts' => $this->postRepository->getAdminListing(),
            'categories' => $this->categoryRepository->getAll(),
            'statuses' => $this->statusRepository->getAll()
        ]);
    }

    public function create(): View
    {
        authorize('create', Post::class);

        register_breadcrumb('Create New Post', route('admin.posts.create'));

        return view('news::admin.post.create', [
            'post' => $this->postRepository->createNewInstance(),
            'categories' => $this->categoryRepository->getAll()
        ]);
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        authorize('create', Post::class);

        if (!$post = $this->postRepository->create($request->all())) {
            return redirect()->back()
                ->with('error', trans_error('messages.error.entity-created', ['entity' => 'Post']));
        }

        return redirect()->route('admin.posts.edit', $post->id)
            ->with('success', trans('messages.success.entity-created', ['entity' => 'Post']));
    }

    public function edit(Post $post): View
    {
        authorize('edit', $post);

        register_breadcrumb("Edit Post: {$post->title}", route('admin.posts.edit', $post->id));

        return view('news::admin.post.edit', [
            'post' => $post,
            'categories' => $this->categoryRepository->getAll(),
            'markAsLiveValidator' => new MarkAsLivePostValidator($post)
        ]);
    }

    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        authorize('edit', $post);

        if (!$this->postRepository->update($post, $request->all())) {
            return redirect()->back()
                ->with('error', trans_error('messages.error.entity-updated', ['entity' => 'Post']));
        }

        return redirect()->back()
            ->with('success', trans('messages.success.entity-updated', ['entity' => 'Post']));
    }

    public function destroy(Post $post): RedirectResponse
    {
        authorize('delete', $post);

        if (!$this->postRepository->delete($post)) {
            return redirect()->back()
                ->with('error', trans_error('messages.error.entity-deleted', ['entity' => 'Post']));
        }

        return redirect()->back()
            ->with('success', trans('messages.success.entity-deleted', ['entity' => 'Post']));
    }
}
