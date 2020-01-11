<?php 

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationCreationRequest;
use App\Models\Organisation;
use Illuminate\Http\Request;
use LaravelApiBase\Http\Controllers\ApiController;

class OrganisationController extends ApiController
{
    public function __construct(Organisation $organisation) {
        parent::__construct($organisation);
    } 

    public function store(Request $request)
    {
        $copy = OrganisationCreationRequest::createFrom($request);
        return parent::store($copy);
    }
}