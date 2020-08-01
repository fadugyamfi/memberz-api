<?php

namespace App\Http\Resources;

use LaravelApiBase\Http\Resources\ApiResource;

class OrganisationInvoiceResource extends ApiResource {

    public function toArray($request)
    {
        $data = array_merge(parent::toArray($request), [
            'organisation_invoice_item' => $this->organisationInvoiceItem,
            'transaction_type' => $this->transactionType,
            'currency' => $this->currency
        ]);

        return $data;
    }
}
