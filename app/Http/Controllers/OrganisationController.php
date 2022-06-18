<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationCreationRequest;
use App\Http\Requests\OrganisationRequest;
use App\Http\Resources\OrganisationResource;
use App\Models\Organisation;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Organisations
 */
class OrganisationController extends Controller
{
    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(Organisation $organisation)
    {
        $this->setApiModel($organisation);
        $this->setApiFormRequest(OrganisationRequest::class);
        $this->setApiResource(OrganisationResource::class);
    }

    /**
     * Create Organisation
     */
    public function store(OrganisationCreationRequest $request) {
        return $this->apiStore($request);
    }

    /**
     * Update Organisation
     */
    public function update(OrganisationRequest $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }

    /**
     * Get Organisation By Slug
     *
     * @group Membership Registration
     */
    public function getBySlug($slug) {
        $organisation = Organisation::where('slug', $slug)->first();

        if( !$organisation ) {
            return response()->json(['message' => 'Organisation not found'], 404);
        }

        return new OrganisationResource($organisation);
    }

    /**
     * Get Organisation Slugs
     */
    public function slugs() {
        $slugs = Organisation::where('active', 1)->select('slug')->get()->pluck('slug');

        return response()->json(['data' => $slugs]);
    }
}
