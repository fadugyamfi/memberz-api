<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentPlatformRequest;
use App\Models\PaymentPlatform;
// use App\Http\Resources\PaymentPlatformResource;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

/**
 * @group Organisation Payment Platforms
 */
class PaymentPlatformController extends Controller
{
    use ApiControllerBehavior;

    public function __construct(PaymentPlatform $paymentPlatform)
    {
        $this->setApiModel($paymentPlatform);
        $this->setApiResource(PaymentPlatformResource::class);
    }

    /**
     * Create Resource
     *
     * @apiResourceModel App\Models\PaymentPlatform
     * @apiResource App\Http\Resources\PaymentPlatformResource
     */
    public function store(PaymentPlatformRequest $request)
    {
        return $this->apiStore($request);
    }

    /**
     * Update Resource
     *
     * @apiResourceModel App\Models\PaymentPlatform
     * @apiResource App\Http\Resources\PaymentPlatformResource
     */
    public function update(PaymentPlatformRequest $request, $id)
    {
        return $this->apiUpdate($request, $id);
    }
}
