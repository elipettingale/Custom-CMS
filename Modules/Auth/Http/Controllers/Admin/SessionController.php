<?php

namespace Modules\Auth\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request;
use Cartalyst\Sentinel\Sentinel;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\Audit\Services\Audit;
use Modules\Auth\Services\SessionManager;

class SessionController extends Controller
{
    private $sentinel;
    private $sessionManager;

    public function __construct(Sentinel $sentinel, SessionManager $sessionManager)
    {
        $this->sentinel = $sentinel;
        $this->sessionManager = $sessionManager;
    }

    public function showLogin(): View
    {
        return view('auth::admin.login.show');
    }

    public function handleLogin(Request $request): RedirectResponse
    {
        $credentials = [
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ];

        if (!$user = $this->sentinel->authenticate($credentials, true, false)) {
            return redirect()->back()
                ->with('error', trans_error('auth::messages.error.login'));
        }

        $this->sentinel->login($user);
        $this->sessionManager->clearImpersonationData();

        Audit::auditable($user)
            ->withMessage('auth::audit.user.logged-in', [
                'user' => $user->present()->fullName
            ]);

        return redirect()->route('admin.dashboard.show')
            ->with('success', trans('auth::messages.success.login', [
                'user' => $user->first_name
            ]));
    }

    public function handleLogout()
    {
        $this->sentinel->logout();
        $this->sessionManager->clearImpersonationData();

        return redirect()->route('admin.login.show')
            ->with('success', trans('auth::messages.success.logout'));
    }
}
