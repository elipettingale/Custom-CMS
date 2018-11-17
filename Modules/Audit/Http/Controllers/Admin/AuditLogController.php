<?php

namespace Modules\Audit\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Modules\Audit\Entities\AuditLog;
use Modules\Audit\Repositories\AuditableTypesRepository;
use Modules\Audit\Repositories\AuditLogRepository;
use Modules\Auth\Repositories\UserRepository;

class AuditLogController extends Controller
{
    private $auditLogRepository;
    private $auditableTypesRepository;
    private $userRepository;

    public function __construct(AuditLogRepository $auditLogRepository, AuditableTypesRepository $auditableTypesRepository, UserRepository $userRepository)
    {
        $this->auditLogRepository = $auditLogRepository;
        $this->auditableTypesRepository = $auditableTypesRepository;
        $this->userRepository = $userRepository;

        register_breadcrumb('Admin', null);
        register_breadcrumb('Audit Logs', route('admin.audit-logs.index'));
    }

    public function index(): View
    {
        authorize('list', AuditLog::class);

        return view('audit::admin.audit-log.index', [
            'auditLogs' => $this->auditLogRepository->getAdminListing(),
            'auditableTypes' => $this->auditableTypesRepository->getAll(),
            'users' => $this->userRepository->getAll()
        ]);
    }

    public function show(AuditLog $auditLog)
    {
        authorize('show', $auditLog);

        register_breadcrumb("View Audit Log: {$auditLog->created_at}", route('admin.audit-logs.show', $auditLog->id));

        return view('audit::admin.audit-log.show', [
            'auditLog' => $auditLog,
            'previousAuditLog' => $this->auditLogRepository->findPrevious($auditLog),
            'relatedAuditLogs' => $this->auditLogRepository->getAllRelated($auditLog)
        ]);
    }
}
