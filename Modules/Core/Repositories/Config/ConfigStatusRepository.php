<?php

namespace Modules\Core\Repositories\Config;

use Modules\Core\Repositories\StatusRepository;
use Modules\Core\ValueObjects\Status;
use Illuminate\Support\Collection;

class ConfigStatusRepository implements StatusRepository
{
    public function find(string $key): ?Status
    {
        return $this->getAll()
            ->where('key', $key)
            ->first();
    }

    public function getAll(): Collection
    {
        $statuses = config('core.statuses');
        $collection = collect();

        foreach ($statuses as $key => $values) {
            $collection->push(new Status($key, $values));
        }

        return $collection;
    }
}
