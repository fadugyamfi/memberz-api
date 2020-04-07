<?php

namespace App\Http\Resources;

use LaravelApiBase\Http\Resources\ApiResource;

class SmsAccountTopupResource extends ApiResource {

    public function toArray($request)
    {
        $data = array_merge(parent::toArray($request), [
            'invoice_description' => $this->organisation_invoice->transaction_type->name,
            'cost' => $this->organisation_invoice->total_due,
            'currency' => $this->organisation_invoice->currency
        ]);

        return $data;
    }
}
