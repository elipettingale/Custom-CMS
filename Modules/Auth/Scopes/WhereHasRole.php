<?php

namespace Modules\Auth\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class WhereHasRole implements Scope
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function apply(Builder $builder, Model $model): void
    {
        $builder->whereHas('roles', function(Builder $builder) {
            $builder->where('id', $this->id);
        });
    }
}
