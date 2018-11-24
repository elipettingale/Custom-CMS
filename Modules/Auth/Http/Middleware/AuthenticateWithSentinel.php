<?php

namespace Modules\Auth\Http\Middleware;

use Cartalyst\Sentinel\Sentinel;
use Closure;
use Illuminate\Http\Request;

class AuthenticateWithSentinel
{
    private $sentinel;

    public function __construct(Sentinel $sentinel) {
        $this->sentinel = $sentinel;
    }

    public function handle(Request $request, Closure $next)
    {
        if (!$this->sentinel->check()) {
            session()->put('url.intended', $request->url());
            return redirect()->route('admin.login.show');
        }

        return $next($request);
    }
}
