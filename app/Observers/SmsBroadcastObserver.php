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
        $smsBroadcast->scheduled_by = auth()->user()->id;
    }


}
