<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrganisationPaymentPlatformRequest;
use App\Models\OrganisationPaymentPlatform;
use App\Http\Resources\OrganisationPaymentPlatformResource;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Organisation Payment Platforms
 */
class OrganisationPaymentPlatformController extends Controller
{
    use ApiControllerBehavior {
        store as apiStore;
        update as apiUpdate;
    }

    public function __construct(OrganisationPaymentPlatform $paymentPlatform)
    {
        $this->setApiModel($paymentPlatform);
        $this->setApiResource(OrganisationPaymentPlatformResource::class);
    }

    /**
     * Create Resource
     *
     * @apiResourceModel App\Models\OrganisationPaymentPlatform
     * @apiResource App\Http\Resources\OrganisationPaymentPlatformResource
     */
    public function store(OrganisationPaymentPlatformRequest $request)
    {
        return $this->apiStore($request);
    }

    /**
     * Update Resource
     *
     * @apiResourceModel App\Models\OrganisationPaymentPlatform
     * @apiResource App\Http\Resources\OrganisationPaymentPlatformResource
     */
    public function update(OrganisationPaymentPlatformRequest $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
