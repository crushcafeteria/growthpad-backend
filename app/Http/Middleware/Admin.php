<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()->privilege != 'ADMIN') {
            session()->flash('errorbox', ['You are not allowed to access this page']);
            return redirect('/cookbook');
        }

        return $next($request);
    }
}
