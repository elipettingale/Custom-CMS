<?php

namespace Modules\Core\Observers;

use Modules\Core\Services\Cache;
use Illuminate\Database\Eloquent\Model;

class EntityCacheObserver
{
    public function created(Model $entity): void
    {
        Cache::flushTags([\get_class($entity)]);
    }

    public function saved(Model $entity): void
    {
        Cache::flushTags([\get_class($entity)]);
    }

    public function deleted(Model $entity): void
    {
        Cache::flushTags([\get_class($entity)]);
    }
}
