<?php

namespace Modules\Auth\Policies;

use Modules\Core\Services\Policy;

class UserPolicy extends Policy
{
    protected $prefix = 'auth.user';

    public function delete($user, $target): bool
    {
        if ($user->id === $target->id) {
            return false;
        }

        if ($this->all($user)) {
            return true;
        }

        return $user->hasAccess('auth.user.delete');
    }

    public function impersonate($user, $target): bool
    {
        if ($user->id === $target->id) {
            return false;
        }

        if ($this->all($user)) {
            return true;
        }

        return $user->hasAccess('auth.user.impersonate');
    }
}
