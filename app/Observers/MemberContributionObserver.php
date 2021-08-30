<?php

namespace App\Observers;

use App\Models\ContributionReceipt;
use App\Models\MemberContribution;

class MemberContributionObserver
{

    /**
     * Handle the member contributions "creating" event.
     *
     * @param  \App\Models\MemberContribution  $memberContribution
     * @return void
     */
    public function creating(MemberContribution $memberContribution) {
        $receipt = $this->createReceipt($memberContribution);

        $memberContribution->module_contribution_receipt_id = $receipt->id;
    }

    private function createReceipt(MemberContribution $memberContribution){
        return ContributionReceipt::create([
            'organisation_id' => $memberContribution->organisation_id,
            'organisation_account_id' => 1, // Get proper id appropriately
            'receipt_no' => $memberContribution->receipt_no,
            'receipt_dt' => $memberContribution->receipt_dt,
            'active' => true
        ]);
    }
}
