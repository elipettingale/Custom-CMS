<?php

namespace Modules\Audit\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface Auditable
{
    public function auditableData(): array;
    public function auditLogs(): MorphMany;
}
