<?php

namespace Modules\Seo\Repositories\Eloquent;

use EliPett\ListingBuilder\Services\BuildListing;
use Illuminate\Support\Collection;
use Modules\Seo\Contracts\HasSeoProfile;
use Modules\Seo\Entities\SeoProfile;
use Modules\Seo\Repositories\SeoProfileRepository;

class EloquentSeoProfileRepository implements SeoProfileRepository
{
    private $seoProfile;

    public function __construct(SeoProfile $seoProfile)
    {
        $this->seoProfile = $seoProfile;
    }

    public function createNewInstance(): SeoProfile
    {
        return new $this->seoProfile;
    }

    public function create(HasSeoProfile $entity, array $data): SeoProfile
    {
        $seoProfile = $this->createNewInstance();
        $seoProfile->fill($data);

        return $entity->seoProfile()->save($seoProfile);
    }

    public function update(SeoProfile $seoProfile, array $data): bool
    {
        $seoProfile->fill($data);

        return $seoProfile->save();
    }

    public function delete(SeoProfile $seoProfile): bool
    {
        return $seoProfile->delete();
    }

    public function findOrNew(HasSeoProfile $entity): SeoProfile
    {
        if (!$seoProfile = $entity->seoProfile) {
            return $this->createNewInstance();
        }

        return $seoProfile;
    }

    public function getAll(): Collection
    {
        return $this->seoProfile
            ->get();
    }
}
