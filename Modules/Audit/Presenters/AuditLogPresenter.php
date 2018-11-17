<?php

namespace Modules\Audit\Presenters;

use Modules\Core\Traits\PresentsTimestamps;
use Laracasts\Presenter\Presenter;

class AuditLogPresenter extends Presenter
{
    use PresentsTimestamps;

    public function message($html = false)
    {
        $message = trans($this->entity->message_key, $this->entity->message_parameters);

        if ($html) {
            foreach ($this->entity->message_parameters as $parameter) {
                $message = str_replace($parameter, "<strong>$parameter</strong>", $message);
            }
        }

        return $message;
    }

    public function userName()
    {
        if (!$user = $this->entity->user) {
            return 'Unknown';
        }

        return $user->present()->fullName;
    }

    public function userEmail()
    {
        if (!$user = $this->entity->user) {
            return 'Unknown';
        }

        return $user->email;
    }

    public function impersonatorName()
    {
        if (!$impersonator = $this->entity->impersonator) {
            return 'Unknown';
        }

        return $impersonator->present()->fullName;
    }

    public function impersonatorEmail()
    {
        if (!$impersonator = $this->entity->impersonator) {
            return 'Unknown';
        }

        return $impersonator->email;
    }
}
