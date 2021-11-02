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
            'contribution_type' => $this->contributionType,
            'member_id' => $this->organisationMember ? $this->organisationMember->member_id : null,
            'member_name' => $this->organisationMember ? $this->organisationMember->member->full_name : null,
            'payment_type' => $this->contributionPaymentType->name,
            'currency_code' => $this->currency->currency_code,
            'receipt_no' => $this->contributionReceipt->receipt_no,
            'receipt_dt' => $this->contributionReceipt->receipt_dt->format('Y-m-d'),
            'month_name' => date('F', strtotime("2021-{$this->month}-01")),
            'bank' => $this->bank
        ]);
    }
}
