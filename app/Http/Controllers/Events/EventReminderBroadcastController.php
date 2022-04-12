<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Models\Events\EventReminderBroadcast;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 *
 * @group Event Reminder Broadcasts
 */
class EventReminderBroadcastController extends Controller {

    use ApiControllerBehavior;

    public function __construct(EventReminderBroadcast $event)
    {
        $this->setApiModel($event);
    }
}
