<?php

namespace App\Jobs\Sms;

use App\Models\OrganisationMember;
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
        public SmsBroadcast $smsBroadcast)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(ConnectBindSmsService $smsService)
    {
        $senderId = $this->smsBroadcast->smsBroadcastList?->sender_id ?? $this->smsBroadcast->smsAccount->sender_id;

        $response = $smsService->send(
            $this->membership->member->mobile_number,
            $this->smsBroadcast->message,
            $senderId
        );

        if( $response['status'] == 'success' ) {
            $this->smsBroadcast->sent_pages += ceil(strlen($this->smsBroadcast->message) / 160);
            $this->smsBroadcast->sent_count++;
            $this->smsBroadcast->save();
        }
    }
}
