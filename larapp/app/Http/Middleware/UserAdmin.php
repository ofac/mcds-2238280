<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class UserAdmin
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
        if (Auth::user() && Auth::user()->role == 'Admin') {
            return $next($request);
        }
        return redirect('home')->with('error', 'You do not have permissions to view this content!');
    }

    
}
