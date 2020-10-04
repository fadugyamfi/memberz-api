<?php

namespace App\Http\Resources;

use LaravelApiBase\Http\Resources\ApiResource;

class OrganisationResource extends ApiResource
{

    public function toArray($request)
    {
        $data = array_merge(parent::toArray($request), [
            'active_subscription' => new OrganisationSubscriptionResource($this->activeSubscrption),
            'organisation_type' => $this->organisationType,
        ]);

        return $data;
    }
}
