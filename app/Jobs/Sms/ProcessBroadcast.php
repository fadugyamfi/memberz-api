<?php

namespace App\Jobs\Sms;

use App\Models\OrganisationMember;
use App\Models\SmsBroadcast;
use App\Services\Sms\SmsBroadcastListService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessBroadcast implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(public SmsBroadcast $broadcast)
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(SmsBroadcastListService $smsBroadcastListService)
    {
        $job = $this;

        if( $this->broadcast->smsBroadcastList ) {
            $smsBroadcastListService->getContactsQuery($this->broadcast->smsBroadcastList)->chunk(500, function($contacts) use($job) {
                $job->messageContacts($contacts);
            });

            return;
        }

        if( $this->broadcast->organisationMemberCategory ) {
            $this->broadcast->organisationMemberCategory->organisationMembers()->latest()->chunk(500, function($contacts) use($job) {
                $job->messageContacts($contacts);
            });
        }
    }

    /**
     * Dispatch Sms Messages to the supplied contacts and mark the broacast as incremented
     */
    private function messageContacts($contacts) {
        foreach($contacts as $contact) {
            SendMessage::dispatch($contact, $this->broadcast);
        }

        $this->broadcast->sent_offset += count($contacts);
        $this->broadcast->save();
    }
}
