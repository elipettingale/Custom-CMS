<?php

namespace Modules\Core\Services;

class Cache
{
    public static function flushTags(array $tags): bool
    {
        try {
            cache()->tags($tags)->flush();
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }
}
