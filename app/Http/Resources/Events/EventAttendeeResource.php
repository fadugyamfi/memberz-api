<?php

namespace App\Http\Resources\Events;

use LaravelApiBase\Http\Resources\ApiResource;
use Illuminate\Support\Str;

class EventAttendeeResource extends ApiResource {

    public function toArray($request)
    {
        return array_merge(parent::toArray($request), [
            'category' => $this->membership?->category,
            'membership' => $this->membership
        ]);
    }
}
