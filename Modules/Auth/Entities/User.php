<?php

namespace Modules\Auth\Entities;

use Carbon\Carbon;
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laracasts\Presenter\PresentableTrait;
use Modules\Audit\Contracts\Auditable;
use Modules\Audit\Traits\AuditableTrait;
use Modules\Auth\Presenters\UserPresenter;
use Modules\Auth\Scopes\WhereHasRole;

class User extends EloquentUser implements Auditable
{
    use PresentableTrait, SoftDeletes, AuditableTrait;

    protected $presenter = UserPresenter::class;

    protected $fillable = [
        'email',
        'first_name',
        'last_name'
    ];

    /**
     * @return array
     * @throws \Laracasts\Presenter\Exceptions\PresenterException
     */
    public function auditableData(): array
    {
        return [
            '#' => $this->id,
            'Email' => $this->email,
            'First Name' => $this->first_name,
            'Last Name' => $this->last_name,
            'Last Login At' => $this->present()->timestamp('last_login'),
            'Deleted At' => $this->present()->timestamp('deleted_at'),
            'Roles' => $this->present()->roles
        ];
    }

    protected $dates = [
        'deleted_at',
        'last_login'
    ];

    public function isActive(): bool
    {
        return $this->last_login >= Carbon::now()->subWeeks(2);
    }

    public function scopeWhereActive(Builder $query)
    {
        $query->where('last_login', '>=', Carbon::now()->subWeeks(2));
    }

    public function scopeWhereInactive(Builder $query)
    {
        $query->where('last_login', '<', Carbon::now()->subWeeks(2))
            ->orWhereNull('last_login');
    }

    public function scopeWhereHasRole(Builder $query, string $id)
    {
        $query->withGlobalScope('whereHasRole', new WhereHasRole($id));
    }

    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucwords($value);
    }

    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucwords($value);
    }
}
