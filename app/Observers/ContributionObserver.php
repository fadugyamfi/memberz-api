<?php

namespace App\Observers;

use App\Models\ContributionReceipt;
use App\Models\Contribution;
use App\Models\ContributionReceiptSetting;
use App\Models\ContributionSummary;
use App\Models\MemberAccount;
use App\Models\SmsAccount;
use App\Models\SmsAccountMessage;
use DateTime;
use Exception;
use Log;
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
        $receipt_dt = $this->getReceiptDate($contribution->module_contribution_receipt_id);

        $existingSummaryRecord = $this->getContributionSummaryRecord($receipt_dt, $contribution);
        $sumAmount = $this->getSumOfContributionAmount($receipt_dt, $contribution);

        if (!$existingSummaryRecord) {
            (new ContributionSummary())->createSummary($receipt_dt, $sumAmount, $contribution);
        } else {
            $existingSummaryRecord->amount = $sumAmount;
            $existingSummaryRecord->save();
        }

        $this->sendSMSReceipt($contribution, auth()->user());
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

        return $sendSmsNotification != null && $sendSmsNotification == true;
    }

    private function organisationSmsNotificationSettingEnabled(int $organisation_id) {
        $receiptSettings = ContributionReceiptSetting::first();
        $smsAccount = SmsAccount::getAccount( $organisation_id );

        return $receiptSettings && $receiptSettings->sms_notify && $smsAccount;
    }

    private function sendSMSReceipt(Contribution $contribution, MemberAccount $user) {
        if(
            !$contribution->isMemberSpecific() ||
            !$this->shouldSendSmsNotification() ||
            !$this->organisationSmsNotificationSettingEnabled($contribution->organisation_id)
        ) {
            return;
        }

        $receipt = $contribution->contributionReceipt;
        $membership = $contribution->organisationMember;
        $txn = $contribution->description ?? $contribution->contributionType->name . ' Payment';
        $paymentType = $contribution->contributionPaymentType;

        $periods = $this->getContributionPeriods($contribution);

        $message = "Dear {$membership->member->first_name} \n"
            . "Your Payment Receipt \n"
            . "Txn: {$txn}\n"
            . "Amt: {$contribution->currency->currency_code} " . number_format($contribution->amount, 2) . "\n"
            . "Receipt No: {$receipt->receipt_no}\n"
            . "Type: {$paymentType->name}\n"
            . "Period: {$periods}\n"
            . "Date: " . date('d M, Y', strtotime($receipt->receipt_dt)) . "\n\n"
            . "Thank you!";

        try {
            SmsAccountMessage::createNew($user, $contribution->organisationMember, $message);
        } catch(Exception $e) {
            Log::error("Cannot send SMS Receipt: " . $e->getMessage() );
        }
    }

    private function getContributionPeriods(Contribution $contribution): string {
        $start_dt = null;
        $periods = null;
        $start_month = null;
        $start_year = null;
        $end_month = null;
        $end_year = null;

        if( $start_dt == null ) {
            $start_dt = new DateTime("{$contribution->year}-{$contribution->month}-01");
            $start_month = $contribution->month;
            $start_year = $contribution->year;
        }

        $current_dt = new DateTime("{$contribution->year}-{$contribution->month}-01");

        // cache period info
        if( $current_dt < $start_dt ) {
            $start_month = $contribution->month;
            $start_year = $contribution->year;
        }

        else if( $current_dt > $start_dt ) {
            $end_month = $contribution->month;
            $end_year = $contribution->year;
        }

        if( $end_month > $start_month || $end_year > $start_year ) {
            $periods = date('M Y', strtotime("$start_year-$start_month-01")) . " - " . date('M Y', strtotime("$end_year-$end_month-01"));
        } else {
            $periods = date('M Y', strtotime("$start_year-$start_month-01"));
        }

        return $periods;
    }
}
