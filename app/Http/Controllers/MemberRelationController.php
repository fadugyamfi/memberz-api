<?php

namespace App\Http\Controllers;

use App\Models\MemberRelation;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Member Profiles
 */
class MemberRelationController extends ApiController
{
    public function __construct(MemberRelation $memberRelation) {
        parent::__construct($memberRelation);
    }
}
