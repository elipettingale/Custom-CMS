<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Modules\Media\Contracts\HasMedia;

class Model extends EloquentModel
{
    public function getAttribute($key)
    {
        if ($this instanceof HasMedia) {
            $definitions = $this->mediaDefinitions();

            if (\array_key_exists($key, $definitions)) {
                return $this->castToMedia($key);
            }
        }

        return parent::getAttribute($key);
    }

    public function getIdentifierAttribute()
    {
        if (property_exists($this, 'identifier')) {
            return $this->{$this->identifier};
        }

        return $this->id;
    }
}
