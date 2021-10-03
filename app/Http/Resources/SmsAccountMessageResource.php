<?php

namespace App\Http\Resources;

use LaravelApiBase\Http\Resources\ApiResource;

class SmsAccountMessageResource extends ApiResource {

    public function toArray($request)
    {
        $data = array_merge(parent::toArray($request), [
            'member' => new MemberResource($this->member),
            'sender' => new OrganisationAccountResource($this->sentBy)
        ]);

        return $data;
    }
}
