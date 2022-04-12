<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Models\Events\EventSession;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 *
 * @group Event Sessions
 */
class EventSessionController extends Controller {

    use ApiControllerBehavior;

    public function __construct(EventSession $event)
    {
        $this->setApiModel($event);
    }
}
