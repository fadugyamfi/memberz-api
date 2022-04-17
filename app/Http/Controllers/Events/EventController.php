<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Http\Resources\Events\EventResource;
use App\Models\Events\Event;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 *
 * @group Events
 */
class EventController extends Controller {

    use ApiControllerBehavior;

    public function __construct(Event $event)
    {
        $this->setApiModel($event);
        $this->setApiResource(EventResource::class);
    }
}
