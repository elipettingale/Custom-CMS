<?php

namespace Modules\Core\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphOne;

interface HasAddress
{
    public function address(): MorphOne;
}
