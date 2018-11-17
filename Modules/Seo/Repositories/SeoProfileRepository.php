<?php

namespace Modules\Seo\Repositories;

use Illuminate\Support\Collection;
use Modules\Seo\Contracts\HasSeoProfile;
use Modules\Seo\Entities\SeoProfile;

interface SeoProfileRepository
{
    public function createNewInstance(): SeoProfile;
    public function create(HasSeoProfile $entity, array $data): SeoProfile;
    public function update(SeoProfile $seoProfile, array $data): bool;
    public function delete(SeoProfile $seoProfile): bool;

    public function findOrNew(HasSeoProfile $entity): SeoProfile;

    public function getAll(): Collection;
}
