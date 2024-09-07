<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



    class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
{
    $guards = empty($guards) ? [null] : $guards;

    foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {
            // Log which route we are redirecting to
            // \Log::info('User is authenticated. Redirecting...', ['guard' => $guard]);

            if ($request->is('admin') || $request->is('admin/*')) {
                return redirect(RouteServiceProvider::Admin);
            } else {
                return redirect(RouteServiceProvider::HOME);
            }
        }
    }

    // Log when user is not authenticated
    // \Log::info('User is not authenticated. Redirecting to signup.', ['request_path' => $request->path()]);

    return $next($request);
}

}



