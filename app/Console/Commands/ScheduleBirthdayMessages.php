<?php

namespace App\Console\Commands;

use App\Models\Organisation;
use App\Models\OrganisationMember;
use App\Models\OrganisationSetting;
use App\Models\SmsAccount;
use App\Models\SmsAccountMessage;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use NunoMazer\Samehouse\Facades\Landlord;
use Spatie\Activitylog\Models\Activity;

class ScheduleBirthdayMessages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:schedule-birthday-messages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command schedules birthday messages due for today to be sent via sms.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info("Processing Birthday Messages");

        $organisation_ids = OrganisationSetting::autoBirthdayMessagingEnabled()
            ->pluck('organisation_id')
            ->all();

        foreach ($organisation_ids as $organisation_id) {
            $organisation = Organisation::find($organisation_id);

            if( !$organisation ) {
                Log::info("Birthday SMS: NOT ACTIVE - Skipping organisation '{$organisation_id}' ");
                continue;
            }

            // apply tenant scopes
            Landlord::addTenant($organisation);
            Landlord::applyTenantScopesToDeferredModels();

            if( !$organisation->smsAccount ) {
                Log::info("Birthday SMS: NO SMS ACCOUNT - Skipping '{$organisation->name}.' ");
                continue;
            }

            if( !$organisation->smsAccount->hasCredit() ) {
                Log::info("Birthday SMS: NO CREDIT - Skipping '{$organisation->name}.' ");
                continue;
            }

            if( $organisation->activeSubscription->isExpired() ) {
                Log::info("Birthday SMS: SUBSCRIPTION EXPIRED - Skipping '{$organisation->name}.' ");
                continue;
            }

            Log::info("Processing Birthdays for {$organisation->name}");
            $this->messageBirthdayCelebrants($organisation);
        }
    }

    public function messageBirthdayCelebrants(Organisation $organisation)
    {
        $smsAccount = SmsAccount::activeAccount($organisation->id)->first();
        $message = OrganisationSetting::getAutomatedBirthdayMessage($organisation->id);
        $messageTime = OrganisationSetting::getAutomatedBirthdayMessageSendTime($organisation->id);

        /** @var Collection $membersBirthdayToday */
        $membersBirthdayToday = OrganisationMember::birthdayCelebrants($organisation->id)->get();

        if( $membersBirthdayToday->count() == 0 ) {
            Log::info("No birthday celebrants for {$organisation->name}");
            return;
        }

        $membersBirthdayToday->each(function ($member) use ($smsAccount, $message, $messageTime) {
            $profileLog = "{$smsAccount->organisation_id}: {$member->first_name} {$member->last_name}, {$member->mobile_number}";

            if (!$member->mobile_number || strlen($member->mobile_number) < 9) {
                Log::info("Birthday Message: Skipping Empty/Invalid Phone number: {$profileLog}");
                return;
            }

            $messagedToday = SmsAccountMessage::whereDate('module_sms_account_instant_messages.created', now()->format('Y-m-d'))
                ->where([
                    'module_sms_account_id' => $smsAccount->id,
                    'member_id' => $member->id,
                    'bday_msg' => true,
                ])
                ->first();



            if ($messagedToday) {
                Log::info("Birthday Message: Already sent/scheduled: {$profileLog}");
                return;
            }

            // create an instant message which will be scheduled for sending in the SmsAccountMessageObserver
            SmsAccountMessage::create([
                'module_sms_account_id' => $smsAccount->id,
                'member_id' => $member->id,
                'to' => $member->mobile_number,
                'message' => $message,
                'sender_id' => $smsAccount->sender_id,
                'bday_msg' => true,
                'sent_at' => now()->format('Y-m-d') . " ${messageTime}:00",
            ]);

            Log::info("Birthday Message: Scheduled: {$profileLog}");
        });

        $logProperties = $membersBirthdayToday->map(function($member) {
            return [
                'member_id' => $member->id,
                'name' => $member->first_name . ' ' . $member->last_name,
                'mobile_number' => $member->mobile_number,
            ];
        });

        activity()
            ->inLog("sms")
            ->withProperties( $logProperties )
            ->performedOn($organisation)
            ->byAnonymous()
            ->event("processed")
            ->tap(function(Activity $activity) use($organisation) {
                $activity->organisation_id = $organisation->id;
            })
            ->log(__("Birthday SMS messages scheduled for :count celebrants in :org_name", [
                "count" => $membersBirthdayToday->count(),
                "org_name" => $organisation->name
            ]));
    }
}
