<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PaidAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth()->check() && $request->user()->hasPaid()) {
            return $next($request);
        }
        return redirect('upgrade');
    }
}
