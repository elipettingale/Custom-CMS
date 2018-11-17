<?php

namespace Modules\Seo\Rules;

use Illuminate\Contracts\Validation\Rule;
use Modules\Seo\Entities\SeoProfile;

class ValidSeoProfile implements Rule
{
    public function passes($attribute, $value)
    {
        if (!$value instanceof SeoProfile) {
            return false;
        }

        if ($value->title === null | $value->description === null) {
            return false;
        }

        return true;
    }

    public function message()
    {
        return 'The :attribute is not complete.';
    }
}
