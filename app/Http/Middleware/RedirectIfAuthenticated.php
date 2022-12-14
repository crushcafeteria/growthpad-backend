<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            session()->flash('successbox', ['You are already logged in. Please continue']);
            if (auth()->user()->privilege == 'ADMIN') {
                return redirect('/dashboard');
            } else {
                return redirect('/cookbook');
            }
        }

        return $next($request);
    }
}
