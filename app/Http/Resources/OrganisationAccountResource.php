<?php

namespace App\Http\Resources;

use LaravelApiBase\Http\Resources\ApiResource;

class OrganisationAccountResource extends ApiResource {

    public function toArray($request)
    {
        $data = array_merge(parent::toArray($request), [
            'member_account' => new MemberAccountResource($this->member_account)
        ]);

        return $data;
    }
}
