<?php

namespace Modules\Core\Http\Middleware;

use Illuminate\Http\Request;
use Closure;

class Telescope
{
    public function handle(Request $request, Closure $next)
    {
        authorize('all', \Laravel\Telescope\Telescope::class);

        return $next($request);
    }
}
