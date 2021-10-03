<?php

namespace App\Http\Controllers;

use App\Models\OrganisationInvoiceItem;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Organisation Invoice Items
 */
class OrganisationInvoiceItemController extends ApiController
{
    public function __construct(OrganisationInvoiceItem $organisationInvoiceItem) {
        parent::__construct($organisationInvoiceItem);
    }
}
