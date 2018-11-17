<?php

namespace Modules\Media\Rules;

use Illuminate\Contracts\Validation\Rule;
use Modules\Media\ValueObjects\Media as MediaObject;

class ValidMedia implements Rule
{
    public function passes($attribute, $value): bool
    {
        if (!$value instanceof MediaObject) {
            return false;
        }

        return $value->isValidMedia();
    }

    public function message(): string
    {
        return 'The :attribute does not contain any media files.';
    }
}
