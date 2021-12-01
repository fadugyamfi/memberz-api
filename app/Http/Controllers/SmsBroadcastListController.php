<?php

namespace App\Http\Controllers;

use App\Models\SmsBroadcastList;
use App\Services\SmsBroadcastListFilterService;
use LaravelApiBase\Http\Controllers\ApiController;

/**
 * @group SMS Broadcast Lists
 */
class SmsBroadcastListController extends ApiController
{
    public function __construct(SmsBroadcastList $broadcastList) {
        parent::__construct($broadcastList);
    }

    public function filters(SmsBroadcastListFilterService $filterService) {
        return $filterService->getFilters();
    }
}
