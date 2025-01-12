<?php

namespace App\Jobs;

use App\Models\Contribution;
use App\Models\ContributionReceiptSetting;
use App\Models\SmsAccount;
use App\Models\SmsAccountMessage;
use DateTime;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use NumberFormatter;

class SendSMSReceipt implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(private Contribution $contribution)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        if(
            !$this->contribution->shouldSendSmsNotification ||
            !$this->contribution->isMemberSpecific() ||
            !$this->organisationSmsNotificationSettingEnabled($this->contribution->organisation_id) || 
            !auth()->check()
        ) {
            return;
        }

        $receipt = $this->contribution->contributionReceipt;
        $membership = $this->contribution->organisationMember;
        $txn = $this->contribution->description ?? $this->contribution->contributionType->name . ' Payment';
        $paymentType = $this->contribution->contributionPaymentType;

        $periods = $this->getContributionPeriods($this->contribution);

        $formatter = NumberFormatter::create("gh_GH", NumberFormatter::CURRENCY);
        $amount = $formatter->formatCurrency($this->contribution->amount, $this->contribution->currency?->currency_code);

        $message = "Dear {$membership->member->first_name}\n"
            . "Your Payment Receipt\n"
            . "Txn: {$txn}\n"
            . "Amt: {$amount}\n"
            . "Receipt No: {$receipt->receipt_no}\n"
            . "Type: {$paymentType->name}\n"
            . "Period: {$periods}\n"
            . "Date: " . date('d M, Y', strtotime($receipt->receipt_dt)) . "\n\n"
            . "Thank you!";

        try {
            SmsAccountMessage::createNew(auth()->user(), $this->contribution->organisationMember, $message);
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

    private function organisationSmsNotificationSettingEnabled(int $organisation_id) {
        $receiptSettings = ContributionReceiptSetting::first();
        $smsAccount = SmsAccount::getAccount( $organisation_id );

        return $receiptSettings && $receiptSettings->sms_notify && $smsAccount;
    }
}
