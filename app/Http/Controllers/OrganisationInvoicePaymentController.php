<?php 

namespace App\Http\Controllers;

use App\Models\OrganisationInvoicePayment;
use LaravelApiBase\Http\Controllers\ApiController;

class OrganisationInvoicePaymentController extends ApiController
{
    public function __construct(OrganisationInvoicePayment $organisationInvoicePayment) {
        parent::__construct($organisationInvoicePayment);
    } 
}