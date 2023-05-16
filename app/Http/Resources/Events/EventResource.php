<?php

namespace App\Http\Resources\Events;

use LaravelApiBase\Http\Resources\ApiResource;
use Illuminate\Support\Str;

class EventResource extends ApiResource {

    private $statistics = [];

    public function addStatistics($values) {
        $this->statistics = $values;
    }

    public function toArray($request)
    {
        $data = array_merge(parent::toArray($request), [
            'organisation_calendar' => $this->calendar,
            'session_count' => $this->sessions()->count(),
            'attendee_count' => $this->attendees()->count(),
            'statistics' => $this->when( !empty($this->statistics), $this->statistics)
        ]);

        return $data;
    }
}
