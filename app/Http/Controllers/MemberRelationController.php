<?php

namespace App\Http\Controllers;

use App\Http\Resources\MemberRelationResource;
use App\Models\MemberRelation;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Member Relations
 */
class MemberRelationController extends Controller
{
    use ApiControllerBehavior;

    public function __construct(MemberRelation $memberRelation) {
        $this->setApiModel($memberRelation);
        $this->setApiResource(MemberRelationResource::class);
    }
}
