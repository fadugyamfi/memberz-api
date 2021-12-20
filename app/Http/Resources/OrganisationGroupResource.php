<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganisationGroupResource extends JsonResource
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
            'organisation_group_leaders' => $this->organisationGroupLeaders->transform(function($leader) {
                return [
                    'id' => $leader->id,
                    'name' => $leader->organisationMember?->member?->name,
                    'organisation_member_id' => $leader->organisation_member_id,
                    'role' => $leader->role
                ];
            })
        ]);
    }
}
