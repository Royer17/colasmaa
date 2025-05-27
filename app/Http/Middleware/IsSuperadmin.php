<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsSuperadmin
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
        if (Auth::user()->is_superadmin == 1) {
            return $next($request);
        }

        Auth::logout();
        return redirect('/');
    }
}
