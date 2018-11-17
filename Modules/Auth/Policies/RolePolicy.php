<?php

namespace Modules\Auth\Policies;

use Modules\Core\Services\Policy;

class RolePolicy extends Policy
{
    protected $prefix = 'auth.role';
}
