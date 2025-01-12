<?php

namespace App\Http\Middleware;

use App\Models\Organisation;
use Closure;
use Illuminate\Http\Request;
use NunoMazer\Samehouse\Facades\Landlord;
use Ramsey\Uuid\Uuid;

class MultiTenant
{

    const X_TENANT_ID = 'X-Tenant-Id';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        if( !$request->hasHeader(self::X_TENANT_ID) ) {
            return abort(403, __("auth.multi-tenant.header-missing"));
        }

        if( $request->hasHeader(self::X_TENANT_ID) && auth()->check() ) {
            $tenantId = $request->header(self::X_TENANT_ID);

            if( !Uuid::isValid($tenantId) ) {
                return abort(403, __("auth.multi-tenant.invalid"));
            }

            /** @var MemberAccount $user */
            $user = auth()->user();
            $organisation_ids = $user->getOrganisationIds();

            /** @var Organisation $organisation */
            $organisation = Organisation::where('uuid', $tenantId)->first();

            if( !$organisation || !collect($organisation_ids)->contains($organisation->id) ) {
                return abort(404, __('auth.multi-tenant.not-permitted', ['org_name' => $organisation->name]));
            }

            Landlord::addTenant($organisation);
            Landlord::applyTenantScopesToDeferredModels();
        }

        return $next($request);
    }
}
