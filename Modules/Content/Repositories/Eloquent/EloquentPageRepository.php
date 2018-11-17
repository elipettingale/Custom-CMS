<?php

namespace Modules\Content\Repositories\Eloquent;

use Modules\Core\Enums\Status;
use EliPett\ListingBuilder\Services\BuildListing;
use Illuminate\Support\Collection;
use Modules\Content\Entities\Page;
use Modules\Content\Repositories\PageRepository;

class EloquentPageRepository implements PageRepository
{
    private $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function createNewInstance(): Page
    {
        $page = new $this->page;
        $page->status = Status::DRAFT;
        $page->data = [];

        return $page;
    }

    public function create(array $data): Page
    {
        $page = $this->createNewInstance();
        $page->fill($data);
        $page->save();

        return $page;
    }

    public function update(Page $page, array $data): bool
    {
        $page->fill($data);

        return $page->save();
    }

    public function markAsLive(Page $page): bool
    {
        $page->status = Status::LIVE;

        return $page->save();
    }

    public function markAsDraft(Page $page): bool
    {
        $page->status = Status::DRAFT;

        return $page->save();
    }

    public function delete(Page $page): bool
    {
        return $page->delete();
    }

    public function findOrFail(int $id): Page
    {
        return $this->page
            ->where('id', $id)
            ->firstOrFail();
    }

    public function findOrFailBySlug(string $slug): Page
    {
        return $this->page
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function findOrFailBySlugWhereLive(string $slug): Page
    {
        return $this->page
            ->whereStatus(Status::LIVE)
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function getAll(): Collection
    {
        return $this->page
            ->get();
    }

    public function getAdminListing(): Collection
    {
        return BuildListing::from($this->page)
            ->ifSet([
                'status' => 'scopeWhereStatus'
            ])
            ->get();
    }
}
