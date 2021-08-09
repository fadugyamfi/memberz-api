<?php

namespace App\Http\Resources;

use LaravelApiBase\Http\Resources\ApiResource;

class MemberResource extends ApiResource {

    public function toArray($request)
    {
        $data = array_merge(parent::toArray($request), [
            'profile_photo' => $this->profilePhoto,
            'member_account' => $this->memberAccount
        ]);

        return $data;
    }
}
