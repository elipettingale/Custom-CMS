<?php

namespace Modules\Seo\Managers;

use Modules\Seo\Entities\SeoProfile;
use Modules\Seo\Repositories\SeoProfileRepository;

class SeoProfileManager
{
    private $seoProfileRepository;

    public function __construct(SeoProfileRepository $seoProfileRepository)
    {
        $this->seoProfileRepository = $seoProfileRepository;
    }

    public function createOrUpdate($entity, array $data): SeoProfile
    {
        if ($seoProfile = $entity->seoProfile) {
            $this->seoProfileRepository->update($seoProfile, $data);

            return $seoProfile;
        }

        return $this->seoProfileRepository->create($entity, $data);
    }
}
