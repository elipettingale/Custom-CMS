<?php

namespace Modules\Content\Repositories;

use Illuminate\Support\Collection;
use Modules\Content\Entities\Page;

interface PageRepository
{
    public function createNewInstance(): Page;
    public function create(array $data): Page;
    public function update(Page $page, array $data): bool;
    public function markAsLive(Page $page): bool;
    public function markAsDraft(Page $page): bool;
    public function delete(Page $page): bool;

    public function findOrFail(int $id): Page;
    public function findOrFailBySlug(string $slug): Page;
    public function findOrFailBySlugWhereLive(string $slug): Page;

    public function getAll(): Collection;
    public function getAdminListing(): Collection;
}
