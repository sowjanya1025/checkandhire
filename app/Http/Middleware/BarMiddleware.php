<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BarMiddleware
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
        if(auth()->user()->verification != 10){
            return redirect()->route('product.index'); 
        }        
        return $next($request);
    }
}
