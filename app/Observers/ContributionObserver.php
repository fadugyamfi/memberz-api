<?php

namespace App\Observers;

use App\Models\ContributionReceipt;
use App\Models\Contribution;
use App\Models\ContributionReceiptSetting;
use App\Models\ContributionSummary;
use App\Models\SmsAccount;
use App\Models\SmsAccountMessage;
use Exception;
use NunoMazer\Samehouse\Facades\Landlord;

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

        if (!$existingSummaryRecord) {
            (new ContributionSummary())->createSummary($receipt_dt, $sumAmount, $contribution);
        } else {
            $existingSummaryRecord->amount = $sumAmount;
            $existingSummaryRecord->save();
        }

        $this->sendSMSReceipt($contribution);
    }

    public function updated(Contribution $contribution) {
        $contribution->contribution_receipt->fill([
            'receipt_dt' => request()->receipt_dt,
            'receipt_no' => request()->receipt_no
        ]);
        $contribution->contribution_receipt->save();
    }

    private function getSumOfContributionAmount(string $receipt_dt, Contribution $contribution) : float {
        return Contribution::getSummaryData($receipt_dt, $contribution)->sum('amount');
    }

    private function getContributionSummaryRecord(string $receipt_dt, Contribution $contribution): ?ContributionSummary {
        return ContributionSummary::getExistingSummaryRecord($receipt_dt, $contribution)->first();
    }

    private function getReceiptDate(int $contribution_receipt_id) : string {
        $contribution_receipt = ContributionReceipt::find($contribution_receipt_id);
        return  $contribution_receipt->receipt_dt;
    }


    private function createReceipt(Contribution $contribution){
        $receiptSettings = ContributionReceiptSetting::first();
        $receipt_no = $receiptSettings->receipt_mode == 'auto' ? $receiptSettings->nextReceiptNo() : request()->receipt_no;
        $receipt_dt = request()->receipt_dt ?? date('Y-m-d');
        $adminAccount = auth()->user()->tenantAccount;

        $receipt = ContributionReceipt::create([
            'organisation_id' => $contribution->organisation_id,
            'organisation_account_id' => $adminAccount?->id,
            'receipt_no' => $receipt_no,
            'receipt_dt' => $receipt_dt,
            'active' => true
        ]);

        if( !$receipt ) {
            throw new Exception('Receipt generation failure');
        }

        $receiptSettings->incrementCounter();

        return $receipt;
    }

    private function sendSMSReceipt(Contribution $contribution) {
        $receiptSettings = ContributionReceiptSetting::first();
        $smsAccount = SmsAccount::getAccount( Landlord::getTenants()->first() );

        if( !$receiptSettings || !$receiptSettings->sms_notify || !$smsAccount ) {
            return;
        }

        $receipt = $contribution->contributionReceipt;
        $membership = $contribution->organisationMember;
        $txn = $contribution->description ?? $contribution->contributionType->name . ' Payment';
        $paymentType = $contribution->contributionPaymentType;

        $message = "Dear {$membership->member->first_name} \n"
            . "Your Payment Receipt \n"
            . "Txn: {$txn}\n"
            . "Amt: {$contribution->currency->currency_code} " . number_format($contribution->amount, 2) . "\n"
            . "Receipt No: {$receipt->receipt_no}\n"
            . "Type: {$paymentType->name}\n"
            . "Date: " . date('d M, Y', strtotime($receipt->receipt_dt)) . "\n\n"
            . "Thank you!";

        SmsAccountMessage::createNew(auth()->user(), $contribution->organisationMember, $message);
    }
}
