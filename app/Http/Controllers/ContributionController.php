<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContributionRequest;
use App\Models\Contribution;
use Illuminate\Http\Request;
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
    }

    /**
     * Create Contribution
     *
     * @apiResourceModel App\Models\Contribution
     */
    public function store(ContributionRequest $request)
    {
        return $this->apiStore($request);
    }

    /**
     * Update Contribution
     *
     * @apiResourceModel App\Models\Contribution
     */
    public function update(ContributionRequest $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
