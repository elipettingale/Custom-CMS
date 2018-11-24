<?php

namespace Modules\News\Repositories;

use Illuminate\Support\Collection;
use Modules\News\Entities\PostCategory;

interface PostCategoryRepository
{
    public function createNewInstance(): PostCategory;
    public function create(array $data): PostCategory;
    public function update(PostCategory $postCategory, array $data): bool;
    public function delete(PostCategory $postCategory): bool;

    public function findOrFail(int $id): PostCategory;
    public function find(int $id): ?PostCategory;
    public function findOrFailBySlug(string $slug): PostCategory;

    public function getAll(): Collection;
    public function getAdminListing(): Collection;
}
