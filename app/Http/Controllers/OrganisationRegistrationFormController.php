<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationRegistrationFormRequest;
use App\Models\OrganisationRegistrationForm;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Organisation
 */
class OrganisationRegistrationFormController extends Controller
{
    use ApiControllerBehavior {
        store as apiStore;
    }

    public function __construct(OrganisationRegistrationForm $registrationForm) {
        $this->setApiModel($registrationForm);
    }

    /**
     * Send Message
     *
     * Adds a message to the queue to dispatch to the phone number
     */
    public function store(OrganisationRegistrationFormRequest $request)
    {
        return $this->apiStore($request);
    }

}
