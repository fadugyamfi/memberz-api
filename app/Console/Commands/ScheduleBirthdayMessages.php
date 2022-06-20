<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\OrganisationMember;
use App\Models\OrganisationSetting;
use App\Models\SmsAccount;
use App\Models\SmsAccountMessage;
use Illuminate\Support\Facades\Log;
use NunoMazer\Samehouse\Facades\Landlord;

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
        $organisation_ids = OrganisationSetting::autoBirthdayMessagingEnabled()
            ->pluck('organisation_id')
            ->all();

        foreach($organisation_ids as $organisation_id) {
            Landlord::addTenant('organisation_id', $organisation_id);
            Landlord::applyTenantScopesToDeferredModels();

            $smsAccount = SmsAccount::activeAccount($organisation_id)->first();
            $message = OrganisationSetting::birthdayMessage($organisation_id);

            $membersBirthdayToday = OrganisationMember::birthdayCelebrants($organisation_id)->get();


            $membersBirthdayToday->each(function($member) use ($smsAccount, $message) {
                if( !$member->mobile_number ) {
                    Log::info("Skipping Birthday Message To Member Without Phone number: {$smsAccount->organisation_id}: {$member->first_name} {$member->last_name}");
                    return;
                }

                $messagedToday = SmsAccountMessage::whereDate('module_sms_account_instant_messages.created', now()->format('Y-m-d'))
                    ->where([
                        'module_sms_account_id' => $smsAccount->id,
                        'member_id' => $member->id,
                        'bday_msg' => true
                    ])
                    ->first();

                if( $messagedToday ) {
                    Log::info("Message already messaged today for their birthday: {$smsAccount->organisation_id}: {$member->first_name} {$member->last_name}");
                    return;
                }

                // create an instant message which will be scheduled for sending in the SmsAccountMessageObserver
                SmsAccountMessage::create([
                    'module_sms_account_id' => $smsAccount->id,
                    'member_id' => $member->id,
                    'to' => $member->mobile_number,
                    'message' => $message,
                    'sender_id' => $smsAccount->sender_id,
                    'bday_msg' => true
                ]);
            });
        }

    }
}
