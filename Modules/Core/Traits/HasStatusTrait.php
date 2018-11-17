<?php

namespace Modules\Core\Traits;

use Modules\Core\Repositories\StatusRepository;
use Modules\Core\ValueObjects\Status;
use Illuminate\Database\Eloquent\Builder;

trait HasStatusTrait
{
    public function scopeWhereStatus(Builder $query, string $status): void
    {
        $query->where('status', $status);
    }

    public function getStatusAttribute($value): ?Status
    {
        return app(StatusRepository::class)->find($value);
    }
}
