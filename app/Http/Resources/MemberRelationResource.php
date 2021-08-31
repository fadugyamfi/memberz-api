<?php

namespace App\Http\Resources;

use App\Models\OrganisationMember;
use Illuminate\Http\Resources\Json\JsonResource;

class MemberRelationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $self = $this;

        return array_merge(parent::toArray($request), [
            'relative' => new MemberResource($this->relative),
            'member_relation_type' => $this->member_relation_type,
            'relative_organisation_member_id' => $this->when($this->relation_member_id != null, function() use($self) {
                $orgMember = OrganisationMember::where('member_id', $self->relation_member_id)->first();
                return $orgMember ? $orgMember->id : null;
            })
        ]);
    }
}
