<?php

namespace Modules\Core\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphOne;

interface Addressable
{
    public function address(): MorphOne;
}
