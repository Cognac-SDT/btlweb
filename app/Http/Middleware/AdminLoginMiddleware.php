<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware
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
        if(\Illuminate\Support\Facades\Auth::check())
        {
            if(Auth::user()->quyen == 1)
            {
                return $next($request);
            }
            else
                return redirect('admin/login');
        }
        else
            return redirect('admin/login');
        
    }
}
