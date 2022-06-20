<?php

namespace App\Jobs\Sms;

use App\Models\SmsAccountMessage;
use App\Services\ConnectBindSmsService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Log;
use romanzipp\QueueMonitor\Traits\IsMonitored;

class SendMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, IsMonitored;

    public SmsAccountMessage $smsMessage;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(SmsAccountMessage $smsMessage)
    {
        $this->smsMessage = $smsMessage;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $obs = $this;
        $smsAccountMessage = $this->smsMessage;

        activity()->withoutLogs(function() use($obs, $smsAccountMessage) {
            $smsService = new ConnectBindSmsService();

            $response = $smsService->send(
                $this->smsMessage->to,
                $this->smsMessage->message,
                $this->smsMessage->sender_id ?? $this->smsMessage->smsAccount?->sender_id
            );

            $obs->processResponse($smsAccountMessage, $response);
        });
    }

    protected function processResponse(SmsAccountMessage $smsAccountMessage, $response) {
        $sent = 0;
        $send_status = '';
        $date = date('Y-m-d H:i:s');

        if( $response['status'] != 'success' || $response['response_code'] != '1701' || $response['status_code'] != 1 ) {
            // TODO: determine what todo if no credit present
            $sent = -1;
            $send_status = "Send Failed. ({$response['response_message']})";
            Log::debug("Failed to send message to {$smsAccountMessage->to} at {$date}. Error: {$response['response_message']}");

            return $smsAccountMessage->updateSentStatus($send_status, $sent);
        }


        $sent = 1;
        $send_status = 'Sent Successfully';
        $pages =  $smsAccountMessage->pages;
        $smsAccountMessage->smsAccount->deductCredit($pages);
        $smsAccountMessage->updateSentStatus($send_status, $sent);

        $this->updateBroadcastSentCounter($smsAccountMessage);

        Log::debug('Sent message successfully to ' . $smsAccountMessage->to . ' at ' . date('Y-m-d H:i:s'));
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
