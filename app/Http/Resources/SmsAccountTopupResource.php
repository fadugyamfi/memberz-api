<?php

namespace App\Http\Resources;

use LaravelApiBase\Http\Resources\ApiResource;

class SmsAccountTopupResource extends ApiResource {

    public function toArray($request)
    {
        $data = array_merge(parent::toArray($request), [
            'invoice_description' => $this->organisationInvoice ? $this->organisationInvoice->transactionType->name : null,
            'cost' => $this->organisationInvoice ? $this->organisationInvoice->total_due : 0,
            'currency' => $this->organisationInvoice ? $this->organisationInvoice->currency : null
        ]);

        return $data;
    }
}
