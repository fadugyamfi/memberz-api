<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Models\Events\Calendar;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;


/**
 * @group Event Calendars
 */
class CalendarController extends Controller {

    use ApiControllerBehavior;

    public function __construct(Calendar $calendar)
    {
        $this->setApiModel($calendar);
    }
}
