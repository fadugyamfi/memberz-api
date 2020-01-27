<?php 


namespace App\Http\Controllers;

use App\Http\Requests\OrganisationCreationRequest;
use App\Models\OrganisationGroupType;
use Illuminate\Http\Request;
use LaravelApiBase\Http\Controllers\ApiController;

class OrganisationGroupTypeController extends ApiController
{
    public function __construct(OrganisationGroupType $organisationGroupType) {
        parent::__construct($organisationGroupType);
    } 

    public function store(Request $request)
    {
        $copy = OrganisationCreationRequest::createFrom($request);
        return parent::store($copy);
    }
}

