<?php

namespace App\Observers;

use App\Models\SmsBroadcastList;
use App\Services\Sms\SmsBroadcastListService;

class SmsBroadcastListObserver
{
    public function __construct(
        private SmsBroadcastListService $broadcastListService
    ) {}

    /**
     * Handle the SmsBroadcastList "created" event.
     *
     * @param  \App\Models\SmsBroadcastList  $smsBroadcastList
     * @return void
     */
    public function created(SmsBroadcastList $smsBroadcastList)
    {
        $smsBroadcastList->size = $this->broadcastListService->getContactsQuery($smsBroadcastList)->count();
        $smsBroadcastList->save();
    }

    /**
     * Handle the SmsBroadcastList "updated" event.
     *
     * @param  \App\Models\SmsBroadcastList  $smsBroadcastList
     * @return void
     */
    public function updated(SmsBroadcastList $smsBroadcastList)
    {
        // if( $smsBroadcastList->isDirty('filters') ) {
        //     $smsBroadcastList->size = $this->broadcastListService->getContactsQuery($smsBroadcastList)->count();
        //     $smsBroadcastList->save();
        // }
    }

    /**
     * Handle the SmsBroadcastList "deleted" event.
     *
     * @param  \App\Models\SmsBroadcastList  $smsBroadcastList
     * @return void
     */
    public function deleted(SmsBroadcastList $smsBroadcastList)
    {
        //
    }

    /**
     * Handle the SmsBroadcastList "restored" event.
     *
     * @param  \App\Models\SmsBroadcastList  $smsBroadcastList
     * @return void
     */
    public function restored(SmsBroadcastList $smsBroadcastList)
    {
        //
    }

    /**
     * Handle the SmsBroadcastList "force deleted" event.
     *
     * @param  \App\Models\SmsBroadcastList  $smsBroadcastList
     * @return void
     */
    public function forceDeleted(SmsBroadcastList $smsBroadcastList)
    {
        //
    }
}
