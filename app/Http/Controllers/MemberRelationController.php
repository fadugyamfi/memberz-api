<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRelationRequest;
use App\Http\Resources\MemberRelationResource;
use App\Models\MemberRelation;
use Illuminate\Http\Request;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Member Relations
 */
class MemberRelationController extends Controller
{
    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(MemberRelation $memberRelation) {
        $this->setApiModel($memberRelation);
        $this->setApiResource(MemberRelationResource::class);
    }

    /**
     * Create Member Relation
     *
     * @apiResourceModel App\Models\MemberRelation
     * @apiResource App\Http\Resources\MemberRelationResource
     */
    public function store(MemberRelationRequest $request)
    {
        return $this->apiStore($request);
    }

    /**
     * Update Member Relation
     *
     * @apiResourceModel App\Models\MemberRelation
     * @apiResource App\Http\Resources\MemberRelationResource
     */
    public function update(MemberRelationRequest $request)
    {
        return $this->apiUpdate($request);
    }
}
