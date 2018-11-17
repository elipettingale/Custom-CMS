<?php

namespace Modules\News\Repositories\Eloquent;

use Carbon\Carbon;
use EliPett\ListingBuilder\Services\BuildListing;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Modules\News\Entities\Post;
use Modules\Core\Enums\Status;
use Modules\News\Repositories\PostRepository;

class EloquentPostRepository implements PostRepository
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function createNewInstance(): Post
    {
        $post = new $this->post;
        $post->status = Status::DRAFT;

        return $post;
    }

    public function create(array $data): Post
    {
        $post = $this->createNewInstance();
        $post->fill($data);
        $post->save();

        return $post;
    }

    public function update(Post $post, array $data): bool
    {
        $post->fill($data);

        return $post->save();
    }

    public function markAsLive(Post $post, $publishedAt): bool
    {
        $post->status = Status::LIVE;
        $post->published_at = $publishedAt;

        return $post->save();
    }

    public function markAsDraft(Post $post): bool
    {
        $post->status = Status::DRAFT;
        $post->published_at = null;

        return $post->save();
    }

    public function delete(Post $post): bool
    {
        return $post->delete();
    }

    public function findOrFail(int $id): Post
    {
        return $this->post
            ->where('id', $id)
            ->firstOrFail();
    }

    public function findOrFailBySlug(string $slug): Post
    {
        return $this->post
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function findOrFailBySlugWhereLive(string $slug): Post
    {
        return $this->post
            ->whereStatus(Status::LIVE)
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function getAll(): Collection
    {
        return $this->post
            ->get();
    }

    public function getLatestWhereLive(int $limit): Collection
    {
        return $this->post
            ->whereStatus(Status::LIVE)
            ->orderBy('published_at', 'desc')
            ->limit($limit)
            ->get();
    }

    public function getFrontendListing(): LengthAwarePaginator
    {
        return BuildListing::from($this->post)
            ->wherePublished()
            ->orderBy('published_at', 'desc')
            ->paginate(12);
    }

    public function getAdminListing(): Collection
    {
        return BuildListing::from($this->post)
            ->whereEqual([
                'category_id',
                'status'
            ])
            ->get();
    }
}
