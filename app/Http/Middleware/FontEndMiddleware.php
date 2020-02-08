<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Session\SessionServiceProvider;

class FontEndMiddleware
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
        if (Session::get('visitorId')){
            return $next($request);
        }else{
            return redirect('/');
        }

    }
}
