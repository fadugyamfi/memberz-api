<?php

namespace App\Observers;

use App\Mail\OrganisationInvoiceCreated;
use App\Mail\OrganisationInvoiceUpdated;
use App\Models\OrganisationInvoice;
use Illuminate\Support\Facades\Mail;

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

        foreach(['support@memberz.org', $organisationInvoice->memberAccount?->username ] as $email) {
            Mail::to($email)->queue( new OrganisationInvoiceCreated($organisationInvoice) );
        }
    }

    public function updated(OrganisationInvoice $organisationInvoice) {
        if( $organisationInvoice->getOriginal('paid') == 0 && $organisationInvoice->paid == 1 ) {
            foreach(['support@memberz.org', $organisationInvoice->memberAccount?->username ] as $email) {
                Mail::to($email)->queue( new OrganisationInvoiceUpdated($organisationInvoice) );
            }

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
