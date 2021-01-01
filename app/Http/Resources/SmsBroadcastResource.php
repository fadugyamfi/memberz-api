<?php

namespace App\Http\Resources;

use LaravelApiBase\Http\Resources\ApiResource;

class SmsBroadcastResource extends ApiResource {

    public function toArray($request)
    {
        $data = array_merge(parent::toArray($request), [
            'organisation_member_category' => $this->organisationMemberCategory,
            'sms_broadcast_list' => $this->smsBroadcastList,
            'scheduled_by' => new OrganisationAccountResource($this->scheduledBy)
        ]);

        return $data;
    }
}
