<?php

namespace Modules\Core\Repositories\Eloquent;

use Modules\Core\Contracts\HasAddress;
use Illuminate\Support\Collection;
use Modules\Core\Entities\Address;
use Modules\Core\Repositories\AddressRepository;

class EloquentAddressRepository implements AddressRepository
{
    private $address;

    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    public function createNewInstance(): Address
    {
        return new $this->address;
    }

    public function create(HasAddress $entity, array $data): Address
    {
        $address = $this->createNewInstance();
        $address->fill($data);

        return $entity->address()->save($address);
    }

    public function update(Address $address, array $data): bool
    {
        $address->fill($data);

        return $address->save();
    }

    public function delete(Address $address): bool
    {
        return $address->delete();
    }

    public function findOrFail(int $id): Address
    {
        return $this->address
            ->where('id', $id)
            ->firstOrFail();
    }

    public function getAll(): Collection
    {
        return $this->address
            ->get();
    }
}
