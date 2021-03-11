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
        $organisationInvoiceItem->organisationInvoice->incrementTotal($organisationInvoiceItem->total);
    }
}
