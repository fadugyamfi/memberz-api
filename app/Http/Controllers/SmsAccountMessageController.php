<?php

namespace App\Http\Controllers;

use App\Http\Requests\SmsAccountMessageRequest;
use App\Models\SmsAccountMessage;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group SMS Account Messages
 */
class SmsAccountMessageController extends Controller
{
    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(SmsAccountMessage $smsAccountMessage) {
        $this->setApiModel($smsAccountMessage);
    }

    /**
     * Send Message
     *
     * Adds a message to the queue to dispatch to the phone number
     */
    public function store(SmsAccountMessageRequest $request)
    {
        return $this->apiStore($request);
    }

    /**
     * Update Message
     *
     * Updates an existing message before / after it has been sent
     */
    public function update(SmsAccountMessageRequest $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
