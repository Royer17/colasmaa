<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckAsesoria
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
        if (in_array(Auth::user()->role_id, [1, 5])) {
            return $next($request);
        }
        
        return redirect('/admin/dashboard');

    }
}
