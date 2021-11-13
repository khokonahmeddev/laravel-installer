<?php

namespace Khokon\Installer\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIfInstalledMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        if (app()->environment('production')) {
            if (!config('installer.installed') && !$request->expectsJson())
                return redirect()->route('install.view');
        }
        return $next($request);
    }
}
