<?php

namespace App\Services;

use App\Models\Support\SmsLog;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ConnectBindSmsService {

    /**
     * Send SMS API URL
     */
    const CB_SEND_URL = 'http://rslr.connectbind.com/bulksms/bulksms';

    /**
     * Get number of credits url
     */
    const CB_CREDITS_URL = 'http://rslr.connectbind.com/bulksms/bulksms?username=%s&password=%s&cmd=credits';

    private $settings = array();

    /**
     * Set username and password
     *
     * @param string
     * @param string
     * @return $this for method chaining
     */
    public function setCredentials($username, $password) {
        $this->settings['username'] = $username;
        $this->settings['password'] = $password;
        return $this;
    }

    /**
     * Set sender
     *
     * @param string
     * @return $this for method chaining
     */
    public function setSender($sender) {
        $this->settings['sender'] = $sender;
        return $this;
    }

    /**
     * Set default prefix
     *
     * @param string
     * @return $this for method chaining
     */
    public function setDefaultPrefix($prefix) {
        $this->settings['default_prefix'] = $prefix;
        return $this;
    }

    public function send($to = null, $text = null, $sender_id = 'Memberz') {

        if ($to == null) {
            $to = "+233277593003";
        }

        if ($text == null) {
            $text = "Hello there. This is a test message from memberz.org";
        }

        try {
            $this->setCredentials( config('sms.connectbind.username'), config('sms.connectbind.password'));
            $this->setSender($sender_id);

            $response = [];
            $params = [
                "username" => $this->settings['username'],
                "password" => $this->settings['password'],
                "type" => 0,
                "dlr" => 1,
                "source" => $this->settings['sender'],
                "destination" => $to,
                "message" => $text
            ];

            $response = [];

            if( config('sms.connectbind.fake_requests') ) {
                $response = $this->fakeRequest($params);
            } else {
                $response = $this->makeRequest($params);
            }

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

        } catch (\Exception $ex) {
            Log::debug($ex->getTraceAsString());
            return [
                'status' => 'error',
                'response_message' => 'Internal API Error',
                'message' => $ex->getMessage(),
                'error' => $ex->getTraceAsString()
            ];
        }
    }

    public function fakeRequest($params) {
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

    public function makeRequest($params) {
        $responseObj = Http::get(ConnectBindSmsService::CB_SEND_URL, $params);

        // $maskedParams = collect($params)->merge(['password' => 'x_x_x'])->toArray();
        // Log::debug("SMS Request: " . ConnectBindSmsService::CB_SEND_URL . "?" . http_build_query($maskedParams));
        // Log::debug($responseObj->body());

        $parts = explode("|", $responseObj->body());

        return [
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
