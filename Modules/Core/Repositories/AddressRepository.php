<?php

namespace Modules\Core\Repositories;

use Modules\Core\Contracts\HasAddress;
use Illuminate\Support\Collection;
use Modules\Core\Entities\Address;

interface AddressRepository
{
    public function createNewInstance(): Address;
    public function create(HasAddress $entity, array $data): Address;
    public function update(Address $address, array $data): bool;
    public function delete(Address $address): bool;

    public function findOrFail(int $id): Address;

    public function getAll(): Collection;
}
