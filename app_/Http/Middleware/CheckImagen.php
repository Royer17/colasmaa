<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckImagen
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
        if (in_array(Auth::user()->role_id, [1, 3])) {
            return $next($request);
        }
        
        return redirect('/admin/dashboard');
    }
}
