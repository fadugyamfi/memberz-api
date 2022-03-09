<?php

namespace App\Observers;

use App\Models\SmsAccount;
use App\Models\SmsAccountMessage;
use App\Services\ConnectBindSmsService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class SmsAccountMessageObserver implements ShouldQueue
{

    protected function processResponse(SmsAccountMessage $smsAccountMessage, $response) {
        $sent = 0;
        $send_status = '';

        if( $response['status'] != 'success' ) {
            // TODO: determine what todo if no credit present
            $sent = -1;
            $send_status = "Send Failed. Not enough credits available.";
            Log::debug('Failed to send message to ' .  $smsAccountMessage->to . ' at ' . date('Y-m-d H:i:s'));

            return $smsAccountMessage->updateSentStatus($send_status, $sent);
        }

        if( $response['status_code'] == 1) {
            $sent = 1;
            $send_status = 'Sent Successfully';
            $pages =  $smsAccountMessage->pages;
            $smsAccountMessage->smsAccount->deductCredit($pages);
            Log::debug('Sent message successfully to ' . $smsAccountMessage->to . ' at ' . date('Y-m-d H:i:s'));

            $this->updateBroadcastSentCounter($smsAccountMessage);

        } else {
            $sent = -1;
            $send_status = "Send Failed. ({$response['last_status']})";
            Log::debug('Message not sent to ' .  $smsAccountMessage->to . ' at ' . date('Y-m-d H:i:s'));
        }

        $smsAccountMessage->updateSentStatus($send_status, $sent);
    }

    /**
     * Handle the sms account message "created" event.
     *
     * @param  \App\Models\SmsAccountMessage  $smsAccountMessage
     * @return void
     */
    public function created(SmsAccountMessage $smsAccountMessage)
    {
        $this->processResponse($smsAccountMessage, $this->sendSmsMessage($smsAccountMessage));
    }

    public function sendSmsMessage(SmsAccountMessage $smsAccountMessage) {
        $smsService = new ConnectBindSmsService();

        return $smsService->send(
            $smsAccountMessage->to,
            $smsAccountMessage->message,
            $smsAccountMessage->sender_id
        );
    }

    public function updateBroadcastSentCounter(SmsAccountMessage $smsAccountMessage) {
        if( !$smsAccountMessage->broadcast ) {
            return;
        }

        $smsAccountMessage->broadcast->sent_pages += $smsAccountMessage->pages;
        $smsAccountMessage->broadcast->sent_count++;
        $smsAccountMessage->broadcast->save();
    }
}
