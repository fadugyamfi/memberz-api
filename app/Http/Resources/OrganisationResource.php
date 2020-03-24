<?php

namespace App\Http\Resources;

use LaravelApiBase\Http\Resources\ApiResource;

class OrganisationResource extends ApiResource
{

    public function toArray($request)
    {
        $data = array_merge(parent::toArray($request), [
            'active_subscription' => new OrganisationSubscriptionResource($this->organisation_subscription()->where('current', 1)->first()),
            'organisation_type' => $this->organisation_type,
        ]);

        return $data;
    }
}
