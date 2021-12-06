<?php

namespace App\Http\Controllers;

use App\Models\SmsBroadcastList;
use App\Services\Sms\SmsBroadcastListService;
use App\Services\Sms\SmsBroadcastListFilterService;
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

    public function preview(SmsBroadcastList $smsBroadcastList, SmsBroadcastListService $listService) {
        return $listService->getContacts($smsBroadcastList);
    }
}
