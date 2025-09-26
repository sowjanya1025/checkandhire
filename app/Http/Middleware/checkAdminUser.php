<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class checkAdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && auth()->user()->role == 'Recruiter'){
            return redirect('/');
        }else if(auth()->check()  && auth()->user()->role == 'Admin'){
            return redirect('/dashboard');
        }else{
            return $next($request);
        }        
    }
}
