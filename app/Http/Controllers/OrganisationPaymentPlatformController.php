<?php

namespace App\Http\Controllers;

use App\Models\OrganisationPaymentPlatform;
use App\Http\Resources\OrganisationPaymentPlatformResource;
use LaravelApiBase\Http\Controllers\ApiControllerBehavior;

class OrganisationPaymentPlatformController extends Controller
{
    use ApiControllerBehavior;

    public function __construct(OrganisationPaymentPlatform $paymentPlatform)
    {
        $this->setApiModel($paymentPlatform);
        $this->setApiResource(OrganisationPaymentPlatformResource::class);
    }
}
