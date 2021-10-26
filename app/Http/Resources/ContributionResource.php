<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContributionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return array_merge(parent::toArray($request), [
            'contribution_type' => $this->contribution_type,
            'member_id' => $this->organisation_member ? $this->organisation_member->member_id : null,
            'member_name' => $this->organisation_member ? $this->organisation_member->member->full_name : null,
            'payment_type' => $this->contribution_payment_type->name,
            'currency_code' => $this->currency->currency_code,
            'receipt_no' => $this->contribution_receipt->receipt_no,
            'receipt_dt' => $this->contribution_receipt->receipt_dt->format('Y-m-d'),
            'month_name' => date('F', strtotime("2021-{$this->month}-01")),
            'bank' => $this->bank
        ]);
    }
}
