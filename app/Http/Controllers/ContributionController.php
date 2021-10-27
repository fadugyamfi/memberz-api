<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContributionRequest;
use App\Http\Resources\ContributionResource;
use App\Models\Contribution;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Contributions
 */
class ContributionController extends Controller
{
    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(Contribution $contribution) {
        $this->setApiModel($contribution);
        $this->setApiResource(ContributionResource::class);
    }

    /**
     * Create Contribution
     *
     * @apiResourceModel App\Models\Contribution
     * @apiResource App\Http\Resources\ContributionResource
     */
    public function store(ContributionRequest $request)
    {
        return $this->apiStore($request);
    }

    /**
     * Update Contribution
     *
     * @apiResourceModel App\Models\Contribution
     * @apiResource App\Http\Resources\ContributionResource
     */
    public function update(ContributionRequest $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }

    /**
     * Get Available Years
     */
    public function getAvailableContributionYears(){
        return Contribution::getLatestYears()->get()->pluck('year');
    }
}
