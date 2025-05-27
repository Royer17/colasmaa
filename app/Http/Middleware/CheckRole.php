<?php

namespace App\Http\Middleware;

use Closure;

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
            return redirect('/colasv2');
        }

        if ($user->role_id == 2) {
            return redirect('/colasv2/manejo-de-tickets');
        }

        if ($user->role_id == 3) {
            return redirect('/');
        }

        return $next($request);
    }
}
