<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Torzer\Awesome\Landlord\Facades\Landlord;

class MultiTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        if ($request->organisation_id) {
            Landlord::addTenant('organisation_id', $request->organisation_id);
        }

        return $next($request);
    }
}
