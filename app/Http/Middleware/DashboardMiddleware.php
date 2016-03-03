<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class DashboardMiddleware
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
        if(Auth::check() && Auth::user()->isAdmin() )
        {
            return $next($request);
        }
        else
        {
            if(Auth::check())
            {
                return Redirect::to('/');
            }
            else
            {
                return Redirect::to('admin/adminlogin');
            }
        }
    }
}