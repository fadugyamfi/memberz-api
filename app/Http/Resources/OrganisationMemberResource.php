<?php

namespace App\Http\Resources;

use LaravelApiBase\Http\Resources\ApiResource;

class OrganisationMemberResource extends ApiResource {

    public function toArray($request)
    {
        $data = array_merge(parent::toArray($request), [
            'member' => $this->when($this->member, new MemberResource($this->member)),
            'organisation_member_category' => $this->organisationMemberCategory,
            'last_attendance' => $this->lastEventAttendance,
            'last_contribution' => $this->lastContribution
        ]);

        return $data;
    }
}
