<?php

namespace App\Observers;

use App\Models\OrganisationInvoice;

class OrganisationInvoiceObserver
{
    /**
     * Handle the organisation invoice "created" event.
     *
     * @param  \App\Models\OrganisationInvoice  $organisationInvoice
     * @return void
     */
    public function created(OrganisationInvoice $organisationInvoice)
    {
        $organisationInvoice->generateInvoiceNumber();
    }

    public function updated(OrganisationInvoice $organisationInvoice) {
        if( $organisationInvoice->getOriginal('paid') == 0 && $organisationInvoice->paid == 1 ) {
            $this->applySmsCreditTopup($organisationInvoice);
        }
    }

    public function applySmsCreditTopup(OrganisationInvoice $invoice) {
        if( !$invoice->smsAccountTopup ) {
            return;
        }

        $invoice->smsAccountTopup->credit();
    }
}
