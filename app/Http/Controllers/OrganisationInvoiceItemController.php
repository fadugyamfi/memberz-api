<?php 

namespace App\Http\Controllers;

use App\Models\OrganisationInvoiceItem;
use LaravelApiBase\Http\Controllers\ApiController;

class OrganisationInvoiceItemController extends ApiController
{
    public function __construct(OrganisationInvoiceItem $organisationInvoiceItem) {
        parent::__construct($organisationInvoiceItem);
    } 
}