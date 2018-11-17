<?php

namespace Modules\Audit\Repositories;

use Illuminate\Support\Collection;
use Modules\Audit\Contracts\Auditable;
use Modules\Audit\Entities\AuditLog;
use Modules\Auth\Entities\User;

interface AuditLogRepository
{
    public function createNewInstance(): AuditLog;
    public function create(Auditable $auditable, ?User $user, ?User $impersonator, array $data): AuditLog;

    public function findOrFail(int $id): AuditLog;
    public function findPrevious(AuditLog $auditLog): ?AuditLog;

    public function getAll(): Collection;
    public function getAllRelated(AuditLog $auditLog): Collection;
    public function getAdminListing(): Collection;
}
