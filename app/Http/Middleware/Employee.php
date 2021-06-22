<?php

namespace App\Http\Middleware;

use Closure;

class Employee
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
        if (!\Illuminate\Support\Facades\Auth::user()->hasRole('employee')) {
            return redirect()->route('access-denied');
        }
        return $next($request);
    }
}
