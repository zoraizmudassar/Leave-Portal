<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AdminTeamLead{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (!\Illuminate\Support\Facades\Auth::user()->hasRole(['admin', 'team_lead'])) {
            return redirect()->route('access-denied');
        }
        return $next($request);
    }

}
