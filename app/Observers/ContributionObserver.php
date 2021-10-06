<?php

namespace App\Observers;

use App\Models\ContributionReceipt;
use App\Models\Contribution;
use App\Models\OrganisationAccount;

class ContributionObserver
{

    /**
     * Handle the member contributions "creating" event.
     *
     * @param  \App\Models\Contribution  $contribution
     * @return void
     */
    public function creating(Contribution $contribution) {
        $receipt = $this->createReceipt($contribution);

        $contribution->module_contribution_receipt_id = $receipt->id;
    }

    private function createReceipt(Contribution $contribution){
        return ContributionReceipt::create([
            'organisation_id' => $contribution->organisation_id,
            'organisation_account_id' => OrganisationAccount::where('member_account_id', auth()->id)->first()->id,
            'receipt_no' => request()->receipt_no,
            'receipt_dt' => request()->receipt_dt,
            'active' => true
        ]);
    }
}
