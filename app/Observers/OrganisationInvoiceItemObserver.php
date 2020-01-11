<?php

namespace App\Observers;

use App\Models\OrganisationInvoiceItem;

class OrganisationInvoiceItemObserver
{
    /**
     * Handle the organisation invoice item "created" event.
     *
     * @param  \App\Models\OrganisationInvoiceItem  $organisationInvoiceItem
     * @return void
     */
    public function created(OrganisationInvoiceItem $organisationInvoiceItem)
    {
        $invoice = $organisationInvoiceItem->organisation_invoice;

        if( $invoice ) {
            $invoice->total_due += $organisationInvoiceItem->total;
            $invoice->save();
        }
    }

    /**
     * Handle the organisation invoice item "updated" event.
     *
     * @param  \App\Models\OrganisationInvoiceItem  $organisationInvoiceItem
     * @return void
     */
    public function updated(OrganisationInvoiceItem $organisationInvoiceItem)
    {
        //
    }

    /**
     * Handle the organisation invoice item "deleted" event.
     *
     * @param  \App\Models\OrganisationInvoiceItem  $organisationInvoiceItem
     * @return void
     */
    public function deleted(OrganisationInvoiceItem $organisationInvoiceItem)
    {
        //
    }

    /**
     * Handle the organisation invoice item "restored" event.
     *
     * @param  \App\Models\OrganisationInvoiceItem  $organisationInvoiceItem
     * @return void
     */
    public function restored(OrganisationInvoiceItem $organisationInvoiceItem)
    {
        //
    }

    /**
     * Handle the organisation invoice item "force deleted" event.
     *
     * @param  \App\Models\OrganisationInvoiceItem  $organisationInvoiceItem
     * @return void
     */
    public function forceDeleted(OrganisationInvoiceItem $organisationInvoiceItem)
    {
        //
    }
}
