<?php

namespace Modules\News\Repositories\Eloquent;

use EliPett\ListingBuilder\Services\BuildListing;
use Illuminate\Support\Collection;
use Modules\Core\Enums\Status;
use Modules\News\Entities\PostCategory;
use Modules\News\Repositories\PostCategoryRepository;

class EloquentPostCategoryRepository implements PostCategoryRepository
{
    private $postCategory;

    public function __construct(PostCategory $postCategory)
    {
        $this->postCategory = $postCategory;
    }

    public function createNewInstance(): PostCategory
    {
        return new $this->postCategory;
    }

    public function create(array $data): PostCategory
    {
        $postCategory = $this->createNewInstance();
        $postCategory->fill($data);
        $postCategory->save();

        return $postCategory;
    }

    public function update(PostCategory $postCategory, array $data): bool
    {
        $postCategory->fill($data);

        return $postCategory->save();
    }

    public function delete(PostCategory $postCategory): bool
    {
        return $postCategory->delete();
    }

    public function findOrFail(int $id): PostCategory
    {
        return $this->postCategory
            ->where('id', $id)
            ->firstOrFail();
    }

    public function find(int $id): ?PostCategory
    {
        return $this->postCategory
            ->where('id', $id)
            ->first();
    }

    public function findOrFailBySlug(string $slug): PostCategory
    {
        return $this->postCategory
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function getAll(): Collection
    {
        return $this->postCategory
            ->get();
    }

    public function getAdminListing(): Collection
    {
        return BuildListing::from($this->postCategory)
            ->withCount('posts')
            ->get();
    }
}
