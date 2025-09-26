<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Student
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
        if(auth()->user()->role != 'Admin'){
            return back();
        }else if(auth()->user()->role != 'Organization'){
            return back();
        }else if(auth()->user()->role != 'Teacher'){
            return back();
        }else{
            return $next($request);
        }        
    }
}
