<?php

namespace App\Http\Resources;

use LaravelApiBase\Http\Resources\ApiResource;

class OrganisationSubscriptionResource extends ApiResource {

    public function toArray($request)
    {
        $data = array_merge(parent::toArray($request), [
            'organisation_invoice' => new OrganisationInvoiceResource($this->organisationInvoice),
            'subscription_type' => $this->subscriptionType
        ]);

        return $data;
    }
}
