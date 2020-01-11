<?php 

namespace App\Http\Controllers;

use App\Models\OrganisationAccount;
use LaravelApiBase\Http\Controllers\ApiController;

class OrganisationAccountController extends ApiController
{
    public function __construct(OrganisationAccount $organisationAccount) {
        parent::__construct($organisationAccount);
    }
}