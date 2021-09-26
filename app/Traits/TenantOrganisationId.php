<?php

namespace App\Traits;

use App\Models\Organisation;

trait TenantOrganisationId
{

    public function getTenantOrganisationId()
    {
        if (!request()->header('X-Tenant-Id')) {
            return null;
        }

        $tenantId = request()->header('X-Tenant-Id');
        return Organisation::where('uuid', $tenantId)->first()->id;
    }

}
