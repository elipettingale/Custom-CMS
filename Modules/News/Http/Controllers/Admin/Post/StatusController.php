<?php

namespace Modules\News\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\News\Entities\Post;
use Modules\News\Repositories\PostRepository;

class StatusController extends Controller
{
    private $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function markAsLive(Request $request, Post $post)
    {
        authorize('mark-as-live', $post);

        $url = redirect()->back()->getTargetUrl() . '#status';

        if (!$this->postRepository->markAsLive($post, $request->get('published_at', Carbon::now()))) {
            return redirect()->to($url)
                ->with('error', trans_error('messages.error.entity-updated', ['entity' => 'Post']));
        }

        return redirect()->to($url)
            ->with('success', trans('messages.success.entity-updated', ['entity' => 'Post']));
    }

    public function markAsDraft(Post $post)
    {
        authorize('mark-as-draft', $post);

        $url = redirect()->back()->getTargetUrl() . '#status';

        if (!$this->postRepository->markAsDraft($post)) {
            return redirect()->to($url)
                ->with('error', trans_error('messages.error.entity-updated', ['entity' => 'Post']));
        }

        return redirect()->to($url)
            ->with('success', trans('messages.success.entity-updated', ['entity' => 'Post']));
    }
}
