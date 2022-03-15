<?php

namespace App\Observers;

use App\Models\Member;

class MemberObserver
{

    /**
     * Handle the member "creating" event.
     *
     * @param  \App\Models\Member  $member
     * @return void
     */
    public function creating(Member $member) {
        $member->mobile_number = preg_replace('#[^\d]#', '', request()->mobile_number);
    }
}
