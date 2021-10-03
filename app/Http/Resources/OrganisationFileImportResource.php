<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrganisationFileImportResource extends JsonResource {

    public function toArray($request)
    {
        return array_merge(parent::toArray($request), [
            'member_account' => new MemberAccountResource($this->member_account)
        ]);
    }
}
