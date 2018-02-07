<?php

namespace Notebook\Http\Middleware;

use Auth;
use Closure;
use League\Flysystem\Exception;

class AuthTest
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
        if(!Auth::check()){
            throw new Exception("Not authenticated");
        } 
        return $next($request);
    }
}
