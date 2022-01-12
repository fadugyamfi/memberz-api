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
        $this->smsBroadcastListService = $smsBroadcastListService;

        $smsAccount = $this->broadcast->smsAccount;
        $totalContacts = $this->getTotalContacts();
        $totalMessages = ceil($this->broadcast->message / 160) * $totalContacts;
        $insufficientCreditForMessages = $smsAccount->available_credit < $totalMessages;

        if( !$smsAccount->hasCredit() || $insufficientCreditForMessages ) {
            $this->broadcast->scheduler?->notifyInsufficientSmsCreditsForBroadcast($this->broadcast);
            $this->broadcast->rescheduleForAnHour();
            return;
        }

        $this->sentMessagesToBroadcastList();
        $this->sendMessagesToMembershipCategory();
    }

    private function sentMessagesToBroadcastList() {
        $job = $this;

        if( $this->broadcast->smsBroadcastList ) {
            $this->smsBroadcastListService->getContactsQuery($this->broadcast->smsBroadcastList)->chunk(500, function($contacts) use($job) {
                $job->messageContacts($contacts);
            });
        }
    }

    private function sendMessagesToMembershipCategory() {
        $job = $this;

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

        $this->broadcast->scheduler?->notifySmsBroadcastProcessed($this->broadcast);
    }

    private function getTotalContacts() {
        return $this->broadcast->smsBroadcastList
            ? $this->smsBroadcastListService->getContactsQuery($this->broadcast->smsBroadcastList)->count()
            : $this->broadcast->organisationMemberCategory?->count();
    }
}
