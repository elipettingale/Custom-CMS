<?php

namespace Modules\Core\Contracts;

use Modules\Core\ValueObjects\Status;
use Illuminate\Database\Eloquent\Builder;

interface HasStatus
{
    public function scopeWhereStatus(Builder $query, string $status): void;
    public function getStatusAttribute($value): ?Status;
}
