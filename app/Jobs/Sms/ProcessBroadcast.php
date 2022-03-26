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
use Illuminate\Support\Facades\Log;

class ProcessBroadcast implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private SmsBroadcastListService $smsBroadcastListService;

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
        Log::info("Processing Broadcast {$this->broadcast->id}");

        $this->smsBroadcastListService = $smsBroadcastListService;

        $smsAccount = $this->broadcast->smsAccount;
        $organisation = $smsAccount->organisation;
        $totalContacts = $this->getTotalContacts();
        $totalMessages = $this->broadcast->message_pages * $totalContacts;
        $insufficientCreditForMessages = $smsAccount->available_credit < $totalMessages;

        if( !$smsAccount->hasCredit() || $insufficientCreditForMessages ) {
            $this->broadcast->scheduler?->notifyInsufficientSmsCreditsForBroadcast($this->broadcast);
            $this->broadcast->rescheduleForAnHour();
            Log::info("Insufficient Sms Account Credits for {$organisation->name}. Broadcast Rescheduled For +1 hours");
            return;
        }

        $this->sentMessagesToBroadcastList();
        $this->sendMessagesToMembershipCategory();
    }

    private function sentMessagesToBroadcastList() {
        $job = $this;

        if( !$this->broadcast->smsBroadcastList ) {
            Log::info("No Broadcast List for Broadcast {$this->broadcast->id}");
            return;
        }

        $query = $this->smsBroadcastListService->getContactsQuery($this->broadcast->smsBroadcastList);
        $contactsToMessage = $query->count();

        if( $contactsToMessage == 0 ) {
            Log::info("No memberships retrieved for broadcast list {$this->broadcast->smsBroadcastList->name} to message");
            $this->markBroadcastProcessedAsUnsent();
            return;
        }

        $query->chunk(500, function($contacts) use($job) {
            $job->messageContacts($contacts);
        });

        $this->markBroadcastProcessedAsSent();
    }

    private function sendMessagesToMembershipCategory() {
        $job = $this;

        if( !$this->broadcast->organisationMemberCategory ) {
            Log::info("No Membership Category for Broadcast {$this->broadcast->id}");
            return;
        }

        $query = $this->broadcast->organisationMemberCategory->organisationMembers()->latest();

        if( $query->count() == 0 ) {
            Log::info("No memberships in category {$this->broadcast->organisationMemberCategory->name} to message");
            $this->markBroadcastProcessedAsUnsent();
            return;
        }

        $query->chunk(500, function($contacts) use($job) {
            $job->messageContacts($contacts);
        });

        $this->markBroadcastProcessedAsSent();
    }

    /**
     * Dispatch Sms Messages to the supplied contacts and mark the broacast as incremented
     */
    private function messageContacts($contacts) {
        Log::info("Sending messages to " . count($contacts) . " contacts with sender_id {$this->broadcast->sender_id}");
        $membership = null;

        foreach($contacts as $contact) {
            $membership = $contact;

            if( $contact->membership_id != null ) {
                $membership = OrganisationMember::find($contact->membership_id);
            }

            SendMessage::dispatch($membership, $this->broadcast);
        }

        $this->broadcast->sent_offset += count($contacts);
        $this->broadcast->save();

        Log::info("Sent messages to " . count($contacts) . " contacts with sender_id {$this->broadcast->sender_id}");
    }

    private function getTotalContacts() {
        return $this->broadcast->smsBroadcastList
            ? $this->smsBroadcastListService->getContactsQuery($this->broadcast->smsBroadcastList)->count()
            : $this->broadcast->organisationMemberCategory?->organisationMembers()->count();
    }

    private function markBroadcastProcessedAsUnsent() {
        $this->broadcast->sent_offset = 500;
        $this->broadcast->sent_pages = 0;
        $this->broadcast->sent_count = 0;
        $this->broadcast->sent = 1;
        $this->broadcast->save();

        $this->broadcast->scheduler?->notifySmsBroadcastProcessed($this->broadcast);
        Log::info("Broadcast {$this->broadcast->id} not sent. No contacts to messge");
    }

    private function markBroadcastProcessedAsSent() {
        $this->broadcast->sent = 1;
        $this->broadcast->save();

        $this->broadcast->scheduler?->notifySmsBroadcastProcessed($this->broadcast);
        Log::info("All messages for Broadcast {$this->broadcast->id} scheduled to be sent.");
    }
}
