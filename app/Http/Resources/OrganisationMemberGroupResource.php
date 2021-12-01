<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganisationMemberGroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request, [
            'organisation_member' => new OrganisationMemberResource($this->organisationMember),
            'organisation_group' => $this->organisationGroup,
            'organisation_group_type' => $this->organisationGroup?->organisationGroupType
        ]);
    }
}
