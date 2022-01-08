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
        if( !$organisationInvoice->hasInvoiceNumber() ) {
            $organisationInvoice->generateInvoiceNumber();
        }
    }

}
