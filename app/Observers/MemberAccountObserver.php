<?php

namespace App\Observers;

use App\Models\MemberAccount;

class MemberAccountObserver
{

    /**
     * Handle the member account "updating" event.
     *
     * @param  \App\Models\MemberAccount  $memberAccount
     * @return void
     */
    public function updating(MemberAccount $memberAccount)
    {
        if($memberAccount->isDirty('email_2fa') && $memberAccount->email_2fa == 1 ) {
            $memberAccount-> emailTwoFa();
        }
    }


}
