<?php

namespace App\Http\Resources;

use LaravelApiBase\Http\Resources\ApiResource;

class OrganisationSubscriptionResource extends ApiResource {

    public function toArray($request)
    {
        $data = array_merge(parent::toArray($request), [
            'organisation_invoice' => new OrganisationInvoiceResource($this->organisation_invoice),
            'subscription_type' => $this->subscription_type
        ]);

        return $data;
    }
}
