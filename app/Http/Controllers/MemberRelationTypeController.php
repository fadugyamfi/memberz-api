<?php

namespace App\Http\Controllers;

use App\Models\MemberRelationType;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Member Relation Types
 */
class MemberRelationTypeController extends ApiController
{
    public function __construct(MemberRelationType $memberRelationType) {
        parent::__construct($memberRelationType);
    }
}
