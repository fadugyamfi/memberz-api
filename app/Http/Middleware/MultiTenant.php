<?php

namespace App\Http\Middleware;

use App\Models\Organisation;
use Closure;
use Illuminate\Http\Request;
use NunoMazer\Samehouse\Facades\Landlord;
use Ramsey\Uuid\Uuid;

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
        if( $request->hasHeader('X-Tenant-Id') && auth()->check() ) {
            $tenantId = $request->header('X-Tenant-Id');

            if( !Uuid::isValid($tenantId) ) {
                return abort(403, "Invalid Tenant ID header value");
            }

            $organisation_ids = auth()->user()->getOrganisationIds();
            $organisation = Organisation::where('uuid', $tenantId)->first();

            if( !$organisation || !collect($organisation_ids)->contains($organisation->id) ) {
                return abort(404, 'Invalid tenant');
            }

            Landlord::addTenant($organisation);
            Landlord::applyTenantScopesToDeferredModels();
        }

        return $next($request);
    }
}
