<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationRegistrationFormRequest;
use App\Models\OrganisationRegistrationForm;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;
use NunoMazer\Samehouse\Facades\Landlord;

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


    public function getBySlug($org_slug, $slug) {

        $registrationForm = OrganisationRegistrationForm::where('slug', $slug)
            ->where('organisation_id', Landlord::getTenants()->first())
            ->first();

        if( !$registrationForm ) {
            return response()->json(['message' => 'Registration form not found'], 404);
        }

        return response()->json(['data' => $registrationForm]);
    }
}
