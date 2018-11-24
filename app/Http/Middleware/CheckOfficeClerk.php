<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckOfficeClerk
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
        if(Auth::user()) {
            if(Auth::user()->user_type != 2 && Auth::user()->user_type != 3 && Auth::user()->user_type != 4 && Auth::user()->user_type != 5) {
                return abort(403, 'Unauthorize Access');
            }
        }
        else {
            return redirect()->route('login')->with('error', 'Login First!');
        }

        return $next($request);
    }
}
