<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberContributionRequest;
use App\Models\MemberContribution;
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

    public function __construct(MemberContribution $memberContribution) {
        $this->setApiModel($memberContribution);
    }

    /**
     * Create Contribution
     *
     * @apiResourceModel App\Models\MemberContribution
     */
    public function store(MemberContributionRequest $request)
    {
        return $this->apiStore($request);
    }

    /**
     * Update Contribution
     *
     * @apiResourceModel App\Models\MemberContribution
     */
    public function update(Request $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
