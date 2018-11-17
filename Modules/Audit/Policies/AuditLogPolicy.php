<?php

namespace Modules\Audit\Policies;

use Modules\Audit\Entities\AuditLog;
use Modules\Auth\Entities\User;
use Modules\Core\Services\Policy;

class AuditLogPolicy extends Policy
{
    protected $prefix = 'audit.audit-log';
}
