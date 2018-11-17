<?php

namespace Modules\Audit\Repositories\Eloquent;

use EliPett\ListingBuilder\Services\BuildListing;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Modules\Audit\Contracts\Auditable;
use Modules\Audit\Entities\AuditLog;
use Modules\Audit\Repositories\AuditLogRepository;
use Modules\Auth\Entities\User;

class EloquentAuditLogRepository implements AuditLogRepository
{
    private $auditLog;

    public function __construct(AuditLog $auditLog)
    {
        $this->auditLog = $auditLog;
    }

    public function createNewInstance(): AuditLog
    {
        return new $this->auditLog;
    }

    public function create(Auditable $auditable, ?User $user, ?User $impersonator, array $data): AuditLog
    {
        $auditLog = $this->createNewInstance();

        $auditLog->auditable()->associate($auditable);
        $auditLog->auditable_data = $auditable->auditableData();

        if ($user) {
            $auditLog->user()->associate($user);
            $auditLog->user_data = $user->auditableData();
        }

        if ($impersonator) {
            $auditLog->impersonator()->associate($impersonator);
            $auditLog->impersonator_data = $impersonator->auditableData();
        }

        $auditLog->message_key = array_get($data, 'message_key');
        $auditLog->message_parameters = array_get($data, 'message_parameters');

        $auditLog->save();

        return $auditLog;
    }

    public function findOrFail(int $id): AuditLog
    {
        return $this->auditLog
            ->where('id', $id)
            ->firstOrFail();
    }

    public function findPrevious(AuditLog $auditLog): ?AuditLog
    {
        return $this->auditLog
            ->where('id', '!=', $auditLog->id)
            ->where('auditable_id', $auditLog->auditable_id)
            ->where('auditable_type', $auditLog->auditable_type)
            ->where('id', '<=', $auditLog->id)
            ->orderBy('id', 'desc')
            ->first();
    }

    public function getAll(): Collection
    {
        return $this->auditLog
            ->get();
    }

    public function getAllRelated(AuditLog $auditLog): Collection
    {
        return $this->auditLog
            ->where('auditable_id', $auditLog->auditable_id)
            ->where('auditable_type', $auditLog->auditable_type)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function getAdminListing(): Collection
    {
        return BuildListing::from($this->auditLog)
            ->whereEqual([
                'auditable_type',
                'user_id'
            ])
            ->get();
    }
}
