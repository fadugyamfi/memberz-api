<?php

namespace App\Observers;

use App\Models\SmsBroadcast;

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
        $smsBroadcast->scheduled_by = $user->tenantAccount->id;
    }
}
