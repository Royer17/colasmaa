<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckMonitorRole
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
        $user = Auth::user();

        if ($user->role_id != 4) {
            Auth::logout();
            return redirect('/panel');
        }

        return $next($request);
    }
}
