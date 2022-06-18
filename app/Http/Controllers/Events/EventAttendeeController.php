<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Http\Resources\Events\EventAttendeeResource;
use App\Models\Events\EventAttendee;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 *
 * @group Event Attendees
 */
class EventAttendeeController extends Controller {

    use ApiControllerBehavior;

    public function __construct(EventAttendee $event)
    {
        $this->setApiModel($event);
        $this->setApiResource(EventAttendeeResource::class);
    }
}
