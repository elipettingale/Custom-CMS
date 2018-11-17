<?php

namespace Modules\Seo\Traits;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use Modules\Seo\Entities\SeoProfile;

trait HasSeoProfileTrait
{
    public function seoProfile(): MorphOne
    {
        return $this->morphOne(SeoProfile::class, 'model');
    }

    public function getSeoProfileAttribute()
    {
        return $this->seoProfile()->first();
    }
}
