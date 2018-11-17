<?php

namespace Modules\Settings\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Audit\Contracts\Auditable;
use Modules\Audit\Traits\AuditableTrait;

class Setting extends Model implements Auditable
{
    use AuditableTrait;

    /**
     * @return array
     */
    public function auditableData(): array
    {
        return [
            'key' => $this->key,
            'value' => $this->value
        ];
    }
}
