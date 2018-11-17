<?php

namespace Modules\Auth\Entities;

use Cartalyst\Sentinel\Roles\EloquentRole;
use Cviebrock\EloquentSluggable\Sluggable;
use Laracasts\Presenter\PresentableTrait;
use Modules\Audit\Contracts\Auditable;
use Modules\Audit\Traits\AuditableTrait;
use Modules\Auth\Presenters\RolePresenter;

class Role extends EloquentRole implements Auditable
{
    use PresentableTrait, Sluggable, AuditableTrait;

    protected $presenter = RolePresenter::class;

    protected $fillable = [
        'name'
    ];

    /**
     * @return array
     */
    public function auditableData(): array
    {
        return [
            '#' => $this->id,
            'Name' => $this->name,
            'Slug' => $this->slug,
            'Permissions' => json_encode($this->permissions)
        ];
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ]
        ];
    }
}
