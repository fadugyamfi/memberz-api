<?php

namespace App\Http\Resources\Events;

use LaravelApiBase\Http\Resources\ApiResource;
use Illuminate\Support\Str;

class EventResource extends ApiResource {

    public function toArray($request)
    {
        $data = array_merge(parent::toArray($request), [
            'organisation_calendar' => $this->calendar,
            'session_count' => $this->sessions()->count()
        ]);

        return $data;
    }
}
