<?php

namespace App\Traits;

use App\Models\Organisation;
use NunoMazer\Samehouse\Facades\Landlord;

trait TenantOrganisationId
{

    public function getTenantOrganisationId()
    {
        $tenantId = Landlord::getTenants()?->first();
        if( $tenantId ) {
            return $tenantId;
        }

        if (!request()->header('X-Tenant-Id')) {
            return null;
        }

        $tenantId = request()->header('X-Tenant-Id');
        return Organisation::where('uuid', $tenantId)->first()->id;
    }

}
