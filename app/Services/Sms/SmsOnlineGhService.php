<?php

namespace App\Services\Sms;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SmsOnlineGhService implements SmsServiceProvider {

    private string $sendUrl = '';
    private string $apiKey = '';

    public function __construct()
    {
        $this->sendUrl = config('sms.smsonlinegh.send_url');
        $this->apiKey = config('sms.smsonlinegh.api_key');
    }


    /**
     * Response sample
     * {
     *       "handshake" : {
     *           "id" : 0,
     *           "label" : "HSHK_OK"
     *       },
     *       "data": {
     *           "batch" : "cfa19ba67f94fbd6b19c067b0c87ed4f",
     *           "category": 1,
     *           "delivery": false,
     *           "destinations": [
     *               {
     *                   "id" : "093841e5-578a-41f4-5f5f-2f3910886c12",
     *                   "to" : "233246314915",
     *                   "status" : {
     *                       "id" : 2105,
     *                       "label" : "DS_PENDING_ENROUTE"
     *                   }
     *               },
     *               {
     *                   "id" : "4abfa3bd-93f9-b8a1-4bbd-78725ca3e488",
     *                   "to" : "233242053072",
     *                   "status" : {
     *                       "id" : 2105,
     *                       "label" : "DS_PENDING_ENROUTE"
     *                   }
     *               }
     *           ]
     *       }
     *   }
     */
    public function send(string $to, string $message, string $sender_id = 'Memberz.Org'): array
    {
        try {
            $response = Http::asJson()
                ->acceptJson()
                ->withHeaders([
                    'Authorization' => "key {$this->apiKey}"
                ])
                ->withoutVerifying()
                ->post($this->sendUrl, [
                    'text' => $message,
                    'type' => 0,	// GSM default
                    'sender' => $sender_id,
                    'destinations'=> [$to]
                ]);

            Log::debug("[SMSOnlineGH] Response: " . $response->body());

            $body = json_decode($response->body());

            return [
                'status' => 'success',
                'response_code' => '1701', // backward compatible change
                'response_message' => 'Sent Successfully',
                'status_code' => 1
            ];
        } catch(\Exception $e) {
            Log::debug("[SMSOnlineGH] " . $e->getMessage() );

            return [
                'status' => 'failed',
                'response_code' => 0,
                'response_message' => $e->getMessage(),
                'status_code' => 5
            ];
        }

    }
}
