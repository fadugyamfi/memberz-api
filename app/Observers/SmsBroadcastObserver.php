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

    /**
     * Handle the SmsBroadcast "updated" event.
     *
     * @param  \App\Models\SmsBroadcast  $smsBroadcast
     * @return void
     */
    public function updated(SmsBroadcast $smsBroadcast)
    {
        //
    }

    /**
     * Handle the SmsBroadcast "deleted" event.
     *
     * @param  \App\Models\SmsBroadcast  $smsBroadcast
     * @return void
     */
    public function deleted(SmsBroadcast $smsBroadcast)
    {
        //
    }

    /**
     * Handle the SmsBroadcast "restored" event.
     *
     * @param  \App\Models\SmsBroadcast  $smsBroadcast
     * @return void
     */
    public function restored(SmsBroadcast $smsBroadcast)
    {
        //
    }

    /**
     * Handle the SmsBroadcast "force deleted" event.
     *
     * @param  \App\Models\SmsBroadcast  $smsBroadcast
     * @return void
     */
    public function forceDeleted(SmsBroadcast $smsBroadcast)
    {
        //
    }
}
