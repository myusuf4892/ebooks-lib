<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        if (Auth::guard($guard)->check() && Auth::user()->role->id == 1) {

            return redirect('admin.index');

        } elseif (Auth::guard($guard)->check() && Auth::user()->role->id == 2) {

            return redirect('donatur.index');

        } elseif (Auth::guard($guard)->check() && Auth::user()->role->id == 3) {

            return redirect('user.index');

        }
        else {

            return $next($request);
        }
    }
}
