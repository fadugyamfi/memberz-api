<?php

namespace App\Jobs\Sms;

use App\Models\SmsBroadcast;
use App\Scopes\SmsAccountScope;
use Illuminate\Support\Facades\Log;

class ScheduleBroadcasts {

    public function __invoke()
    {
        $broadcasts = SmsBroadcast::withoutGlobalScope(SmsAccountScope::class)
            ->unsent()
            ->where('send_at', '<=', now()->format('Y-m-d H:i:s'))
            ->where(function($query) {
                $query->where('sent_offset', 0)
                    ->orWhereNull('sent_offset');
            })
            ->get();

        $broadcasts->each(function(SmsBroadcast $broadcast) {
            ProcessBroadcast::dispatch($broadcast);
        });

    }
}
