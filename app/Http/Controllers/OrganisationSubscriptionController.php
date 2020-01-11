<?php 

namespace App\Http\Controllers;

use App\Models\OrganisationSubscription;
use LaravelApiBase\Http\Controllers\ApiController;

class OrganisationSubscriptionController extends ApiController
{
    public function __construct(OrganisationSubscription $organisationSubscription) {
        parent::__construct($organisationSubscription);
    }
} 