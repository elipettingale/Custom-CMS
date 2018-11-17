<?php

namespace Modules\Seo\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphOne;

interface HasSeoProfile
{
    public function seoProfile(): MorphOne;
}
