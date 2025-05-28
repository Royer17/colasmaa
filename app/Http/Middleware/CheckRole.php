<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
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

        if ($user->role_id == 1) {
            Auth::logout();
            return redirect('/panel');
        }

        if ($user->is_superadmin == 1) {
            Auth::logout();
            return redirect('/panel');
        }

        if ($user->role_id == 2) {
            return redirect('/colasv2/manejo-de-tickets');
        }

        if ($user->role_id == 3) {
            return redirect('/colasv2');
        }

        return $next($request);
    }
}
