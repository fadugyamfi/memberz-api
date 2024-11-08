<?php

namespace App\Services\Sms;

use App\Models\Support\SmsLog;
use Illuminate\Support\Facades\Log;
use Str;

class LocalSmsService implements SmsServiceProvider {


    public function send(string $to, string $text, ?string $sender_id = 'Memberz.Org'): array
    {
        Log::debug("[LocalSMS] Sent SMS to {$to} from {$sender_id}. Message: {$text}");

        $params = [
            "type" => 0,
            "dlr" => 1,
            "source" => $sender_id,
            "destination" => $to,
            "message" => $text
        ];

        $response = $this->fakeRequest($params);

        $last_message_id = null;
        $last_status_group_id = null;
        $failures = array();

        if( $response['code'] == '1701' ) {
            $last_message_id = $response['message_id'];
            $last_status_group_id = 1;

        } else {
            $last_status_group_id = 5;
            $failures[] = [
                'to' => $to,
                'last_status' => $response['code']
            ];
        }

        SmsLog::logMsg($sender_id, $to, $text, $last_message_id, $last_status_group_id);

        return array(
            'status' => 'success',
            'response_code' => $response['code'],
            'last_message_id' => $last_message_id,
            'response' => $response,
            'failures' => $failures,
            'status_code' => $last_status_group_id,
            'response_message' => $this->getCodeMessage($response['code'])
        );
    }

    private function fakeRequest($params) {
        $response = "1701|{$params['destination']}|" . Str::uuid() . "|fake-response";
        Log::info($response);

        $parts = explode("|", $response);

        return [
            'fake' => true,
            'code' => $parts[0],
            'number' => $parts[1] ?? null,
            'message_id' => $parts[2] ?? null
        ];
    }

    public function getCodeMessage($code) {
        switch($code) {
            case '1702': return 'Invalid URL. One of the parameters was not provided';
            case '1703': return 'Invalid value in username or password parameter.';
            case '1704': return 'Invalid value in type parameter.';
            case '1705': return 'Invalid message';
            case '1706': return 'Invalid destination';
            case '1707': return 'Invalid source (Sender)';
            case '1708': return 'Invalid value for dlr parameter';
            case '1709': return 'User validation failed';
            case '1710': return 'Internal error';
            case '1025': return 'Insufficient credit';
            case '1715': return 'Response timeout';
            case '1032': return 'DND Reject';
            case '1028': return 'Spam message';
            default: return 'Success';
        }
    }
}
