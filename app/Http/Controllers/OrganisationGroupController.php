<?php 

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationCreationRequest;
use App\Models\OrganisationGroup;
use Illuminate\Http\Request;
use LaravelApiBase\Http\Controllers\ApiController;

class OrganisationGroupController extends ApiController
{
    public function __construct(OrganisationGroup $OrganisationGroup) {
        parent::__construct($OrganisationGroup);
    } 

    public function store(Request $request)
    {
        $copy = OrganisationCreationRequest::createFrom($request);
        return parent::store($copy);
    }
}