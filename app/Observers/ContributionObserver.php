<?php

namespace App\Observers;

use App\Jobs\SendSMSReceipt;
use App\Models\ContributionReceipt;
use App\Models\Contribution;
use App\Models\ContributionReceiptSetting;
use App\Models\ContributionSummary;
use Exception;

class ContributionObserver
{

    /**
     * Handle the member contributions "creating" event.
     *
     * @param  \App\Models\Contribution  $contribution
     * @return void
     */
    public function creating(Contribution $contribution) {
        if( $contribution->module_contribution_receipt_id ) {
            return;
        }

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
        $contribution->shouldSendSmsNotification = $this->shouldSendSmsNotification();

        $receipt_dt = $this->getReceiptDate($contribution->module_contribution_receipt_id);

        $existingSummaryRecord = $this->getContributionSummaryRecord($receipt_dt, $contribution);
        $sumAmount = $this->getSumOfContributionAmount($receipt_dt, $contribution);

        if (!$existingSummaryRecord) {
            (new ContributionSummary())->createSummary($receipt_dt, $sumAmount, $contribution);
        } else {
            $existingSummaryRecord->amount = $sumAmount;
            $existingSummaryRecord->save();
        }

        // attempt sending an sms notification. Will cancel out if conditions are not met
        SendSMSReceipt::dispatchSync($contribution, auth()->user());
    }

    public function updated(Contribution $contribution) {
        $contribution->contributionReceipt->fill([
            'receipt_dt' => request()->receipt_dt,
            'receipt_no' => request()->receipt_no
        ]);
        $contribution->contributionReceipt->save();
    }

    private function getSumOfContributionAmount(string $receipt_dt, Contribution $contribution): float {
        return Contribution::getSummaryData($receipt_dt, $contribution)->sum('amount');
    }

    private function getContributionSummaryRecord(string $receipt_dt, Contribution $contribution): ?ContributionSummary {
        return ContributionSummary::getExistingSummaryRecord($receipt_dt, $contribution)->first();
    }

    private function getReceiptDate(int $contribution_receipt_id): ?string {
        $contributionReceipt = ContributionReceipt::find($contribution_receipt_id);
        return $contributionReceipt?->receipt_dt;
    }


    private function createReceipt(Contribution $contribution){
        $receiptSettings = ContributionReceiptSetting::first();
        $receipt_no = $receiptSettings->receipt_mode == 'auto' ? $receiptSettings->nextReceiptNo() : request()->receipt_no;
        $receipt_dt = request()->receipt_dt ?? date('Y-m-d');
        $adminAccount = auth()->user()?->tenantAccount;

        $receipt = ContributionReceipt::firstOrCreate([
            'receipt_no' => $receipt_no,
            'receipt_dt' => $receipt_dt,
            'organisation_id' => $contribution->organisation_id,
        ],[
            'organisation_account_id' => $adminAccount?->id,
            'active' => true
        ]);

        if( !$receipt ) {
            throw new Exception('Receipt generation failure');
        }

        if( $receipt->wasRecentlyCreated && $receiptSettings->receipt_mode == 'auto') {
            $receiptSettings->incrementCounter();
        }

        return $receipt;
    }

    private function shouldSendSmsNotification() {
        $sendSmsNotification = request('send_sms');

        return $sendSmsNotification == true;
    }

    
}
