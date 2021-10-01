<?php

namespace App\Http\Resources;

use LaravelApiBase\Http\Resources\ApiResource;
use Illuminate\Support\Str;

class ActivityLogResource extends ApiResource {

    public function toArray($request)
    {
        $data = array_merge(parent::toArray($request), [
            'causer' => $this->causer,
            'log_display_name' => Str::title( Str::replace('_', ' ', $this->log_name) )
        ]);

        return $data;
    }
}
