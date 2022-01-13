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
            ->readyToSend()
            ->where(function($query) {
                $query->where('sent_offset', 0)
                    ->orWhereNull('sent_offset');
            })
            ->get();

        $broadcasts->each(function(SmsBroadcast $broadcast) {
            Log::info("Scheduled SMS Broadcast {$broadcast->id}");
            ProcessBroadcast::dispatch($broadcast);
        });

    }
}
