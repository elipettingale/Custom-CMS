<?php

namespace Modules\Settings\Http\Middleware;

use Cartalyst\Sentinel\Sentinel;
use Closure;

class MaintenanceMode
{
    private $sentinel;

    public function __construct(Sentinel $sentinel)
    {
        $this->sentinel = $sentinel;
    }

    public function handle($request, Closure $next, $guard = null)
    {
        if (!setting('maintenance_mode')) {
            return $next($request);
        }

        if (!$this->sentinel->check()) {
            abort(404);
        }

        if ($this->sentinel->getUser()->hasAccess('settings.maintenance-access')) {
            return $next($request);
        }

        abort(404);
    }
}
