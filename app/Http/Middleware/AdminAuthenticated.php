<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth()->check() && $request->user()->isAdmin()) {
            return $next($request);
        }
        return redirect('home');
    }
}
