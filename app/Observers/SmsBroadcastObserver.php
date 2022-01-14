<?php

namespace App\Observers;

use App\Models\SmsBroadcast;
use NunoMazer\Samehouse\Facades\Landlord;

class SmsBroadcastObserver
{
    /**
     * Handle the SmsBroadcast "created" event.
     *
     * @param  \App\Models\SmsBroadcast  $smsBroadcast
     * @return void
     */
    public function creating(SmsBroadcast $smsBroadcast)
    {
        /** @var MemberAccount $user */
        $user = auth()->user();
        $tenantId = Landlord::getTenants()->first();
        $smsBroadcast->scheduled_by = $user->organisationAccounts()->where('organisation_id', $tenantId)->first()->id;
    }
}
