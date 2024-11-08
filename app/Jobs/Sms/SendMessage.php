<?php

namespace App\Jobs\Sms;

use App\Models\SmsAccount;
use App\Models\SmsAccountMessage;
use App\Models\SystemSetting;
use App\Services\ConnectBindSmsService;
use App\Services\Sms\SmsServiceProvider;
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

        if( empty($this->smsMessage->to) ) {
            Log::error("Cannot send SMS to empty mobile number. Sender ID: {$this->smsMessage->sender_id} SMS Message #{$this->smsMessage->id}");
            return;
        }

        $setting = SystemSetting::where('name', 'sms_credits')->first();

        if( $setting && $setting->value <= 0 ) {
            $smsAccountMessage->updateSentStatus("Send Failed. Contact support@memberz.org", 0);
            Log::error("Cannot send SMS. System has no SMS credits");
            activity('sms')->log('SMS messaging failed. System does not have enough SMS credits');
            return;
        }

        if( $setting && $setting->value < $smsAccountMessage->pages ) {
            $smsAccountMessage->updateSentStatus("Send Failed. Contact support@memberz.org", 0);
            Log::error("Cannot send SMS. System does not have enough SMS credits");
            activity('sms')->log('SMS messaging failed. System does not have enough SMS credits');
            return;
        }

        if( !$this->smsMessage->smsAccount->active ) {
            Log::debug("SMS Account Not Active For Sender ID '{$this->smsMessage->smsAccount->sender_id}'. Ignoring message to {$this->smsMessage->to}");
            $smsAccountMessage->updateSentStatus("Send Failed. Sms Account Inactive", 0);
            activity('sms')->log('SMS messaging failed. SMS Account Inactive');
            return;
        }

        activity()->withoutLogs(function() use($obs, $smsAccountMessage) {
            $smsService = app(SmsServiceProvider::class);

            $message = $this->smsMessage->message;
            $senderId = $this->smsMessage->sender_id ?? $this->smsMessage->smsAccount?->sender_id;

            if( !SmsAccount::isApprovedSenderId($senderId) ) {
                $message = "From {$senderId}\n\n{$message}";
                $senderId = 'Memberz.Org';
            }

            $response = $smsService->send($this->smsMessage->to, $message, $senderId);

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
        SystemSetting::deductSmsCredits($pages);
        $smsAccountMessage->updateSentStatus($send_status, $sent);

        $this->updateBroadcastSentCounter($smsAccountMessage);

        Log::debug('Sent message successfully to ' . $smsAccountMessage->to . ' from ' . $smsAccountMessage->sender_id .  ' at ' . date('Y-m-d H:i:s'));
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
