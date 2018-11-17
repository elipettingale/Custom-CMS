<?php

namespace Modules\Media\Services;

use Illuminate\Support\Collection;
use Modules\Media\ValueObjects\Media;

class MediaFactory
{
    public static function make(Collection $media, string $key, array $definition)
    {
        if (!array_get($definition, 'multiple', false)) {
            return new Media($media->first(), $definition);
        }

        $data = collect();

        foreach ($media as $item) {
            $data->push(new Media($item, $definition));
        }

        return $data;
    }
}
