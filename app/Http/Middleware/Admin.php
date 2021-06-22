<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class Admin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!\Illuminate\Support\Facades\Auth::user()->hasRole('admin')) {
            return redirect()->route('access-denied');
        }
        return $next($request);


//        return $next($request);
    }

}
