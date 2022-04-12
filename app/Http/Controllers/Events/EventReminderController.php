<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Models\Events\EventReminder;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 *
 * @group Event Reminders
 */
class EventReminderController extends Controller {

    use ApiControllerBehavior;

    public function __construct(EventReminder $event)
    {
        $this->setApiModel($event);
    }
}
