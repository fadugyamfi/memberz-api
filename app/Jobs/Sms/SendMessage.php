<?php

namespace App\Jobs\Sms;

use App\Models\OrganisationMember;
use App\Models\SmsAccountMessage;
use App\Models\SmsBroadcast;
use App\Services\ConnectBindSmsService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        public OrganisationMember $membership,
        public SmsBroadcast $smsBroadcast
    ) {}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $senderId = $this->smsBroadcast->smsBroadcastList?->sender_id ?? $this->smsBroadcast->smsAccount->sender_id;

        // create an instant message which will be scheduled for sending in the SmsAccountMessageObserver
        return SmsAccountMessage::create([
            'module_sms_account_id' => $this->smsBroadcast->module_sms_account_id,
            'organisation_id' => $this->smsBroadcast->organisation_id,
            'member_id' => $this->membership->member_id,
            'to' => $this->membership->member->mobile_number,
            'message' => $this->smsBroadcast->personalizeMessage($this->membership),
            'sent_by' => $this->smsBroadcast->scheduled_by,
            'sender_id' => $senderId,
            'module_sms_account_broadcast_id' => $this->smsBroadcast->id
        ]);
    }
}
