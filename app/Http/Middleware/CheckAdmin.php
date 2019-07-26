<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        // if (!Auth::check() && !Auth::user()->is_admin === true) {
        //     return route("auth.login");
        // }

        if (!auth()->user() || auth()->user()->is_admin === false) {
            return redirect()->route('auth.login');
        }

        return $next($request);
    }
}
