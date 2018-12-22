<?php

namespace Modules\Auth\Http\Middleware;

use Cartalyst\Sentinel\Sentinel;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Auth\Entities\User;
use Modules\Auth\Repositories\UserRepository;

class AuthenticateWithSentinel
{
    private $sentinel;
    private $userRepository;

    public function __construct(Sentinel $sentinel, UserRepository $userRepository)
    {
        $this->sentinel = $sentinel;
        $this->userRepository = $userRepository;
    }

    public function handle(Request $request, Closure $next)
    {
        if (!$this->sentinel->check()) {
            if (!$this->shouldLoginDeveloper()) {
                return $this->redirectToLogin($request->url());
            }

            $this->loginDeveloper();
        }

        return $next($request);
    }

    private function shouldLoginDeveloper(): bool
    {
        if (env('APP_ENV') !== 'local') {
            return false;
        }

        if (config('auth.automatically_login_developer') !== true) {
            return false;
        }

        if (!$this->userRepository->findByEmail(env('APP_DEVELOPER', '')) instanceof User) {
            return false;
        }

        return true;
    }

    private function redirectToLogin(string $intended): RedirectResponse
    {
        session()->put('url.intended', $intended);

        return redirect()->route('admin.login.show');
    }

    private function loginDeveloper(): void
    {
        $developer = $this->userRepository->findOrFailByEmail(
            env('APP_DEVELOPER')
        );

        $this->sentinel->login($developer);
    }
}
