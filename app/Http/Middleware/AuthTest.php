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
            return response()->json(['Status code' => '10.4.2 401 Unauthorized']);
        } else {
            
            return $next($request);
        }
    }
}
