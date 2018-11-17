<?php

namespace Modules\Auth\Presenters;

use Modules\Core\Enums\CarbonFormats;
use Modules\Core\Traits\PresentsTimestamps;
use Carbon\Carbon;
use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter
{
    use PresentsTimestamps;

    public function fullName()
    {
        return $this->entity->first_name . ' ' . $this->entity->last_name;
    }

    public function roles()
    {
        return implode(', ', $this->entity->roles()->pluck('name')->toArray());
    }
}
