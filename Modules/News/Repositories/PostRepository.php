<?php

namespace Modules\News\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Modules\News\Entities\Post;

interface PostRepository
{
    public function createNewInstance(): Post;
    public function create(array $data): Post;
    public function update(Post $post, array $data): bool;
    public function markAsLive(Post $post, $publishedAt): bool;
    public function markAsDraft(Post $post): bool;
    public function delete(Post $post): bool;

    public function findOrFail(int $id): Post;
    public function findOrFailBySlug(string $slug): Post;
    public function findOrFailBySlugWhereLive(string $slug): Post;

    public function getAll(): Collection;
    public function getLatestWhereLive(int $limit): Collection;
    public function getFrontendListing(): LengthAwarePaginator;
    public function getAdminListing(): Collection;
}
