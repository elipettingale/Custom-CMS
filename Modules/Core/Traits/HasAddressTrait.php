<?php

namespace Modules\Core\Traits;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use Modules\Core\Entities\Address;

/**
 * Trait HasAddressTrait
 * @package Modules\Core\Traits
 *
 * @property Address $address
 */
trait HasAddressTrait
{
    public function address(): MorphOne
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
