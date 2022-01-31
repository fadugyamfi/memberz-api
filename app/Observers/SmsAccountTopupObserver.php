<?php

namespace App\Observers;

use App\Models\OrganisationInvoice;
use App\Models\OrganisationInvoiceItem;
use App\Models\SmsAccountTopup;
use App\Models\SubscriptionType;
use App\Models\TransactionType;

class SmsAccountTopupObserver
{
    /**
     * Create Invoice
     */
    public function createInvoice(SmsAccountTopup $topup)
    {
        $transactionType = TransactionType::where('name', 'SMS Credit Topup')->first();

        $invoice = OrganisationInvoice::create([
            'transaction_type_id' => $transactionType->id,
            'currency_id' => $topup->smsCredit->currency_id,
            'paid' => 0,
            'member_account_id' => auth()->user()->id,
            'due_date' => date('Y-m-d H:i:s', strtotime("+7 days")),
            'notes' => __("Your new organisation will be temporarily enabled for <b>7 days</b> within which you will be required to make
                    payment for your chosen subscription via any cash, cheque or bank transfer to the indicated bank account. <br /><br />

                    Your new organisation setup will be disabled after <b>7 days</b> pending payment."),
        ]);

        if ($invoice) {
            $quantity = ceil($topup->credit_amount / $topup->smsCredit->credit_amount);

            $invoice->organisationInvoiceItems()->saveMany([
                new OrganisationInvoiceItem([
                    'qty' => $quantity,
                    'product_type' => 'subscription',
                    'product_id' => $topup->smsCredit->id,
                    'description' => $topup->smsCredit->credit_amount . __(' SMS Credits'),
                    'unit_price' => $topup->smsCredit->cost,
                    'total' => $quantity * $topup->smsCredit->cost,
                ]),
            ]);
        }

        return $invoice;
    }

    /**
     * Handle the SmsAccountTopup "created" event.
     *
     * @param  \App\Models\SmsAccountTopup  $smsAccountTopup
     * @return void
     */
    public function created(SmsAccountTopup $smsAccountTopup)
    {
        if( $smsAccountTopup->organisationInvoice ) {
            return;
        }

        $invoice = $this->createInvoice($smsAccountTopup);
        $smsAccountTopup->organisation_invoice_id = $invoice->id;
        $smsAccountTopup->save();
    }

    /**
     * Handle the SmsAccountTopup "updated" event.
     *
     * @param  \App\Models\SmsAccountTopup  $smsAccountTopup
     * @return void
     */
    public function updated(SmsAccountTopup $smsAccountTopup)
    {
        //
    }

    /**
     * Handle the SmsAccountTopup "deleted" event.
     *
     * @param  \App\Models\SmsAccountTopup  $smsAccountTopup
     * @return void
     */
    public function deleted(SmsAccountTopup $smsAccountTopup)
    {
        //
    }

    /**
     * Handle the SmsAccountTopup "restored" event.
     *
     * @param  \App\Models\SmsAccountTopup  $smsAccountTopup
     * @return void
     */
    public function restored(SmsAccountTopup $smsAccountTopup)
    {
        //
    }

    /**
     * Handle the SmsAccountTopup "force deleted" event.
     *
     * @param  \App\Models\SmsAccountTopup  $smsAccountTopup
     * @return void
     */
    public function forceDeleted(SmsAccountTopup $smsAccountTopup)
    {
        //
    }
}
