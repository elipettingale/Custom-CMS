<?php

namespace Modules\Auth\Http\Controllers\Admin;

use Illuminate\Http\RedirectResponse;
use Modules\Audit\Services\Audit;
use Modules\Auth\Entities\User;
use Modules\Auth\Services\SessionManager;

class ImpersonationController
{
    private $sessionManager;

    public function __construct(SessionManager $sessionManager)
    {
        $this->sessionManager = $sessionManager;
    }

    public function impersonate(User $user): RedirectResponse
    {
        authorize('impersonate', $user);

        if (!$this->sessionManager->impersonateUser($user)) {
            return redirect()->back()
                ->with('error', trans_error('auth::messages.error.user-impersonated', [
                    'name' => $user->present()->fullName
                ]));
        }

        Audit::auditable($user)
            ->withMessage('auth::audit.user.impersonated', [
                'user' => $user->present()->fullName,
                'impersonator' => current_user()->present()->fullName
            ]);

        return redirect()->route('admin.dashboard.show')
            ->with('success', trans('auth::messages.success.user-impersonated', [
                'name' => $user->present()->fullName
            ]));
    }

    public function restore(): RedirectResponse
    {
        if (!$this->sessionManager->restoreUser()) {
            return redirect()->back()
                ->with('error', trans_error('auth::messages.error.session-restored'));
        }

        return redirect()->route('admin.users.index')
            ->with('success', trans('auth::messages.success.session-restored'));
    }
}
