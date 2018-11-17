<?php

namespace Modules\Audit\Services;

use Illuminate\Database\Eloquent\Model;
use Modules\Audit\Contracts\Auditable;
use Modules\Audit\Entities\AuditLog;
use Modules\Audit\Repositories\AuditLogRepository;
use Modules\Audit\ValueObjects\AuditLogDefinition;
use Modules\Auth\Entities\User;
use Modules\Auth\Services\SessionManager;

class Audit
{
    public $auditable;

    public $messageKey;
    public $messageParameters;

    public function __construct(Auditable $auditable)
    {
        $this->auditable = $auditable;
    }

    public static function auditable(Auditable $auditable): Audit
    {
        return new self($auditable);
    }

    public function withMessage(string $messageKey, array $messageParameters = []): ?AuditLog
    {
        $user = current_user();
        $impersonator = null;

        if (user_is_being_impersonated()) {
            $impersonator = app(SessionManager::class)->getOriginalUser();
        }

        return app(AuditLogRepository::class)->create($this->auditable, $user, $impersonator, [
            'message_key' => $messageKey,
            'message_parameters' => $messageParameters
        ]);
    }
}
