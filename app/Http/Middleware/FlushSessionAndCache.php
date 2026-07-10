<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;

class FlushSessionAndCache
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
        // Flush the session
        Session::flush();
        
        // Clear all cache
        Cache::flush();
        
        // Proceed with the request
        return $next($request);
    }
}
