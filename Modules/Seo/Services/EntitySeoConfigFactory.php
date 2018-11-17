<?php

namespace Modules\Seo\Services;

use Modules\Seo\Contracts\HasSeoProfile;

class EntitySeoConfigFactory
{
    public static function make(HasSeoProfile $entity): array
    {
        $parts = explode('\\', \get_class($entity));
        $trans = trans(tight_case($parts[1]) . '::entities.' . lower_hyphen_case($parts[3]));
        $identifier = $trans['identifier'];

        return [
            'module' => $parts[1],
            'entity' => $trans['entity'],
            'entity_plural' => $trans['entity_plural'],
            'identifier' => $entity->$identifier
        ];
    }
}
