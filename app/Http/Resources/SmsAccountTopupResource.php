<?php

namespace App\Http\Resources;

use LaravelApiBase\Http\Resources\ApiResource;

class SmsAccountTopupResource extends ApiResource {

    public function toArray($request)
    {
        $data = array_merge(parent::toArray($request), [
            'invoice_description' => $this->organisationInvoice?->transactionType->name,
            'cost' => $this->organisationInvoice?->total_due,
            'currency' => $this->organisationInvoice?->currency
        ]);

        return $data;
    }
}
