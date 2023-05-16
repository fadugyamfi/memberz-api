<?php

namespace App\Http\Controllers\Events;

use App\Http\Controllers\Controller;
use App\Http\Requests\Events\EventSessionRequest;
use App\Models\Events\EventSession;
use Illuminate\Http\Request;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 *
 * @group Event Sessions
 */
class EventSessionController extends Controller {

    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(EventSession $event)
    {
        $this->setApiModel($event);
    }

    public function store(EventSessionRequest $request)
    {
        return $this->apiStore($request);
    }

    public function update(EventSessionRequest $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
