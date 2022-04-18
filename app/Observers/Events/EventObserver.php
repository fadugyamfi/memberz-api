<?php

namespace App\Observers\Events;

use App\Models\Events\Event;
use Carbon\Carbon;
use Str;

class EventObserver
{

    /**
     * Handle the Event "creating" event.
     *
     * @param  \App\Models\Events\Event  $event
     * @return void
     */
    public function creating(Event $event)
    {
        $event->slug = Str::slug($event->event_name) . '-' . rand(10000,99999);
    }

    /**
     * Handle the Event "created" event.
     *
     * @param  \App\Models\Events\Event  $event
     * @return void
     */
    public function created(Event $event)
    {
        $start_dt = Carbon::parse($event->start_dt);
        $end_dt = Carbon::parse($event->end_dt);
        $day = 1;

        while($start_dt <= $end_dt) {
            $event->sessions()->create([
                'organisation_id' => $event->organisation_id,
                'session_name' => $event->event_name . ' - Day ' . $day++,
                'session_dt' => $start_dt,
                'registration_code' => Str::upper(Str::random(8))
            ]);

            $start_dt->add('day', 1);
        }

    }

    /**
     * Handle the Event "updated" event.
     *
     * @param  \App\Models\Events\Event  $event
     * @return void
     */
    public function updated(Event $event)
    {
        //
    }

    /**
     * Handle the Event "deleted" event.
     *
     * @param  \App\Models\Events\Event  $event
     * @return void
     */
    public function deleted(Event $event)
    {
        //
    }

    /**
     * Handle the Event "restored" event.
     *
     * @param  \App\Models\Events\Event  $event
     * @return void
     */
    public function restored(Event $event)
    {
        //
    }

    /**
     * Handle the Event "force deleted" event.
     *
     * @param  \App\Models\Events\Event  $event
     * @return void
     */
    public function forceDeleted(Event $event)
    {
        //
    }
}
