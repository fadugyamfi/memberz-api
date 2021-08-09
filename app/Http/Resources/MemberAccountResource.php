<?php

namespace App\Http\Resources;

use LaravelApiBase\Http\Resources\ApiResource;

class MemberAccountResource extends ApiResource {

    public function toArray($request)
    {
        $data = array_merge(parent::toArray($request), [
            'member' => $this->member
        ]);

        return $data;
    }
}
