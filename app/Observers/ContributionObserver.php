<?php

namespace App\Observers;

use App\Models\ContributionReceipt;
use App\Models\Contribution;
use App\Models\ContributionSummary;
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

    /**
     * Handle the member contributions "created" event.
     *
     * @param  \App\Models\Contribution  $contribution
     * @return void
     */
    public function created(Contribution $contribution) {
        $receipt_dt = $this->getReceiptDate($contribution->module_contribution_receipt_id);

        $existingSummaryRecord = $this->getContributionSummaryRecord($receipt_dt, $contribution);
        $sumAmount = $this->getSumOfContributionAmount($receipt_dt, $contribution);

        if (! $existingSummaryRecord) {
            (new ContributionSummary())->createSummary($receipt_dt, $sumAmount, $contribution);
        } else {
            $existingSummaryRecord->amount = $sumAmount;
            $existingSummaryRecord->save();
        }
    }

    private function getSumOfContributionAmount(string $receipt_dt, Contribution $contribution) : float {
        return Contribution::getSummaryData($receipt_dt, $contribution)->sum('amount');
    }

    private function getContributionSummaryRecord(string $receipt_dt, Contribution $contribution) : ContributionSummary {
        return ContributionSummary::getExistingSummaryRecord($receipt_dt, $contribution)->first();
    }

    private function getReceiptDate(int $contribution_receipt_id) : string {
        $contribution_receipt = ContributionReceipt::find($contribution_receipt_id);
        return  $contribution_receipt->receipt_dt;
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
