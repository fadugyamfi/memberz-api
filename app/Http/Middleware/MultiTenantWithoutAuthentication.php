<?php

namespace App\Http\Middleware;

use App\Models\Organisation;
use Closure;
use Illuminate\Http\Request;
use NunoMazer\Samehouse\Facades\Landlord;
use Ramsey\Uuid\Uuid;

class MultiTenantWithoutAuthentication
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
            return abort(403, __("No organisation specified"));
        }

        if( $request->hasHeader('X-Tenant-Id') ) {
            $tenantId = $request->header('X-Tenant-Id');

            if( !Uuid::isValid($tenantId) ) {
                return abort(403, __("Invalid organisation identifier specified"));
            }

            $organisation = Organisation::where('uuid', $tenantId)->first();

            Landlord::addTenant($organisation);
            Landlord::applyTenantScopesToDeferredModels();
        }

        return $next($request);
    }
}
