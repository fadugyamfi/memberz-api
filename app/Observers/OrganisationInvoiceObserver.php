<?php

namespace App\Observers;

use App\Models\OrganisationInvoice;

class OrganisationInvoiceObserver
{
    /**
     * Handle the organisation invoice "created" event.
     *
     * @param  \App\OrganisationInvoice  $organisationInvoice
     * @return void
     */
    public function created(OrganisationInvoice $organisationInvoice)
    {
        // generate an invoice number
        if( !$organisationInvoice->invoice_no ) {
            $organisationInvoice->invoice_no = $organisationInvoice->organisation_id . str_pad($organisationInvoice->id, 5, '0', STR_PAD_LEFT);
            $organisationInvoice->save();
        }
    }

    /**
     * Handle the organisation invoice "updated" event.
     *
     * @param  \App\OrganisationInvoice  $organisationInvoice
     * @return void
     */
    public function updated(OrganisationInvoice $organisationInvoice)
    {
        //
    }

    /**
     * Handle the organisation invoice "deleted" event.
     *
     * @param  \App\OrganisationInvoice  $organisationInvoice
     * @return void
     */
    public function deleted(OrganisationInvoice $organisationInvoice)
    {
        //
    }

    /**
     * Handle the organisation invoice "restored" event.
     *
     * @param  \App\OrganisationInvoice  $organisationInvoice
     * @return void
     */
    public function restored(OrganisationInvoice $organisationInvoice)
    {
        //
    }

    /**
     * Handle the organisation invoice "force deleted" event.
     *
     * @param  \App\OrganisationInvoice  $organisationInvoice
     * @return void
     */
    public function forceDeleted(OrganisationInvoice $organisationInvoice)
    {
        //
    }
}
