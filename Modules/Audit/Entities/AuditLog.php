<?php

namespace Modules\Audit\Entities;

use Illuminate\Database\Eloquent\Model;
use Laracasts\Presenter\PresentableTrait;
use Modules\Audit\Contracts\Auditable;
use Modules\Audit\Presenters\AuditLogPresenter;
use Modules\Auth\Entities\User;

class AuditLog extends Model
{
    use PresentableTrait;

    protected $presenter = AuditLogPresenter::class;

    protected $casts = [
        'auditable_data' => 'array',
        'user_data' => 'array',
        'impersonator_data' => 'array',
        'message_parameters' => 'array'
    ];

    public function auditable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function impersonator()
    {
        return $this->belongsTo(User::class, 'impersonator_id');
    }
}
