<?php

namespace App\Http\Resources;

use LaravelApiBase\Http\Resources\ApiResource;

class OrganisationInvoiceResource extends ApiResource {

    public function toArray($request)
    {
        $data = array_merge(parent::toArray($request), [
            'organisation_invoice_item' => $this->organisation_invoice_item,
            'transaction_type' => $this->transaction_type,
            'currency' => $this->currency
        ]);

        return $data;
    }
}
