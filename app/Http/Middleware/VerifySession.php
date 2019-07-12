<?php

namespace App\Http\Middleware;

use Closure;

class VerifySession
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
        // if($request->session()->has('userInfo'))
        // {
        //     return $next($request);
        // }
        // else
        // {
        //     return redirect('/login');
        // }

        if(!$request->session()->has('userInfo'))
        {
            return redirect('/login');
        }
        return $next($request);
    }
}
