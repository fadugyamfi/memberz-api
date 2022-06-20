<?php

namespace App\Observers;

use App\Models\SmsAccountMessage;
use App\Jobs\Sms\SendMessage;
use App\Models\OrganisationMember;
use Carbon\Carbon;


class SmsAccountMessageObserver
{

    /**
     * Handle the sms account message "creating" event.
     *
     * @param  \App\Models\SmsAccountMessage  $smsAccountMessage
     * @return void
     */
    public function creating(SmsAccountMessage $smsAccountMessage) {
        $membership = OrganisationMember::where('member_id', $smsAccountMessage->member_id)->first();

        $smsAccountMessage->message = $smsAccountMessage->personalize(
            $membership,
            $smsAccountMessage->smsAccount,
            $smsAccountMessage->message
        );
    }

    /**
     * Handle the sms account message "created" event.
     *
     * @param  \App\Models\SmsAccountMessage  $smsAccountMessage
     * @return void
     */
    public function created(SmsAccountMessage $smsAccountMessage)
    {
        if( $smsAccountMessage->sent ) {
            return;
        }

        if( $smsAccountMessage->sent_at ) {
            SendMessage::dispatch($smsAccountMessage)->delay(Carbon::parse($smsAccountMessage->sent_at));
        } else {
            SendMessage::dispatch($smsAccountMessage);
        }
    }
}
