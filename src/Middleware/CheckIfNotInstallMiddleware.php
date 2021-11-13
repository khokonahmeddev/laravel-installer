<?php

namespace Khokon\Installer\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIfNotInstallMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (app()->environment('production')) {
            if (!config('installer.installed'))
                return $next($request);
            else
                return redirect()->route('login');
        }
        return $next($request);
    }
}
