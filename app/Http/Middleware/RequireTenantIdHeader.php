<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RequireTenantIdHeader
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
        if( !$request->hasHeader('X-Tenant-Id') ) {
            return abort(403, "Tenant ID header required");
        }

        return $next($request);
    }
}
