<?php

namespace Modules\Core\Services;

use Illuminate\Support\Collection;

interface AddressLookup
{
    /**
     * Returns a collection of possible addresses
     * @param string $search
     * @return Collection
     */
    public function search(string $search): Collection;

    /**
     * Returns an addresses details
     * @param string $id
     * @return array
     */
    public function retrieve(string $id): array;
}
