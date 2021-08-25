<?php

namespace App\Http\Controllers;

use App\Models\MemberContribution;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group Member
 */
class MemberContributionController extends ApiController
{
    public function __construct(MemberContribution $memberContribution) {
        parent::__construct($memberContribution);
    }
}
