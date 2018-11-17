<?php

namespace Modules\Audit\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Audit\Entities\AuditLog;

trait AuditableTrait
{
    public function auditLogs(): MorphMany
    {
        return $this->morphMany(AuditLog::class, 'auditable');
    }
}
