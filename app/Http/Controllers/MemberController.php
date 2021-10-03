<?php

namespace App\Http\Controllers;

use App\Models\Member;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Member Profiles
 */
class MemberController extends ApiController
{
    public function __construct(Member $member) {
        parent::__construct($member);
    }
}
