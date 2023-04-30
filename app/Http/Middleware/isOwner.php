<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class isOwner
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
        if(Auth::user()->role == "owner"){
            return $next($request);
        }
        abort('401');
    }
}
