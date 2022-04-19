<?php

namespace App\Jobs\Sms;

use App\Models\Member;
use App\Models\OrganisationMember;
use App\Models\OrganisationSetting;
use Illuminate\Support\Facades\Log;

class ScheduleBirthdayMessages {

    public function __invoke()
    {
        $organisation_ids = OrganisationSetting::autoBirthdaySetting()
            ->pluck('organisation_id')
            ->all();
        
        foreach($organisation_ids as $organisation_id) {
            $member_ids = OrganisationMember::memberIds($organisation_id);

            $membersBirthdayToday = Member::membersBirthdayToday($member_ids)->get();

            $membersBirthdayToday->each(function(Member $member){
                Log::info("Scheduled Happy Birthday SMS to Memberz.org user  {$member->full_name}");

                ProcessBirthdayMessage::dispatch($member);
            });
        }
    }
}
