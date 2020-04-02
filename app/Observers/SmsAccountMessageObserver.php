<?php

namespace App\Observers;

use App\Models\SmsAccount;
use App\Models\SmsAccountMessage;
use App\Services\ConnectBindSmsService;
use Illuminate\Support\Facades\Log;

class SmsAccountMessageObserver
{
    /**
     * Handle the sms account message "created" event.
     *
     * @param  \App\SmsAccountMessage  $smsAccountMessage
     * @return void
     */
    public function created(SmsAccountMessage $smsAccountMessage)
    {

        $smsService = new ConnectBindSmsService();
        $response = $smsService->send(
            $smsAccountMessage->to,
            $smsAccountMessage->message,
            $smsAccountMessage->sms_account->sender_id
        );

        Log::debug($response);
    }

    /**
     * Handle the sms account message "updated" event.
     *
     * @param  \App\SmsAccountMessage  $smsAccountMessage
     * @return void
     */
    public function updated(SmsAccountMessage $smsAccountMessage)
    {
        //
    }

    /**
     * Handle the sms account message "deleted" event.
     *
     * @param  \App\SmsAccountMessage  $smsAccountMessage
     * @return void
     */
    public function deleted(SmsAccountMessage $smsAccountMessage)
    {
        //
    }

    /**
     * Handle the sms account message "restored" event.
     *
     * @param  \App\SmsAccountMessage  $smsAccountMessage
     * @return void
     */
    public function restored(SmsAccountMessage $smsAccountMessage)
    {
        //
    }

    /**
     * Handle the sms account message "force deleted" event.
     *
     * @param  \App\SmsAccountMessage  $smsAccountMessage
     * @return void
     */
    public function forceDeleted(SmsAccountMessage $smsAccountMessage)
    {
        //
    }
}
