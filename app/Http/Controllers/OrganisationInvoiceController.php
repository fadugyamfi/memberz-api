<?php

namespace App\Http\Controllers;

use App\Models\OrganisationInvoice;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Organisation Invoices
 */
class OrganisationInvoiceController extends ApiController
{
    public function __construct(OrganisationInvoice $organisationInvoice) {
        parent::__construct($organisationInvoice);
    }
}
