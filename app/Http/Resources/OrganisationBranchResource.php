<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganisationBranchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array_merge(parent::toArray($request), [
            'organisation' => [
                'name' => $this->organisation?->name,
                'email' => $this->organisation?->email,
                'phone' => $this->organisation?->phone,
                'logo' => $this->organisation?->logo,
            ],
            'branch' => [
                'name' => $this->branch?->name,
                'email' => $this->branch?->email,
                'phone' => $this->branch?->phone,
                'logo' => $this->branch?->logo,
                'short_description' => $this->branch?->short_description,
            ],
            'primary_contact' => [
                'title' => $this->primaryContact?->title,
                'name' => $this->primaryContact?->full_name,
                'email' => $this->primaryContact?->email,
                'mobile_number' => $this->primaryContact?->mobile_number,
            ],
            'secondary_contact' => [
                'title' => $this->secondaryContact?->title,
                'name' => $this->secondaryContact?->full_name,
                'email' => $this->secondaryContact?->email,
                'mobile_number' => $this->secondaryContact?->mobile_number,
            ],
            'tags' => $this->tags
        ]);
    }
}
