<?php

namespace Modules\Audit\Repositories\Config;

use Modules\Core\ValueObjects\KeyValuePair;
use Illuminate\Support\Collection;
use Modules\Audit\Repositories\AuditableTypesRepository;

class ConfigAuditableTypesRepository implements AuditableTypesRepository
{
    public function getAll(): Collection
    {
        $auditableTypes = config('audit.auditable-types', []);

        $collection = collect();

        foreach ($auditableTypes as $key => $value) {
            $collection->push(new KeyValuePair($key, $value));
        }

        return $collection;
    }
}
