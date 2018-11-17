<?php

namespace Modules\Core\Repositories;

use Modules\Core\Contracts\Addressable;
use Illuminate\Support\Collection;
use Modules\Core\Entities\Address;

interface AddressRepository
{
    public function createNewInstance(): Address;
    public function create(Addressable $entity, array $data): Address;
    public function update(Address $address, array $data): bool;
    public function delete(Address $address): bool;

    public function findOrFail(int $id): Address;

    public function getAll(): Collection;
}
