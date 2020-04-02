<?php

namespace App\Services;

use App\Models\Support\SmsLog;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

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
            $options = array();

            $responseObj = Http::get( ConnectBindSmsService::CB_SEND_URL, array(
                "username" => $this->settings['username'],
                "password" => $this->settings['password'],
                "type" => 0,
                "dlr" => 1,
                "source" => $this->settings['sender'],
                "destination" => $to,
                "message" => $text
            ), $options);

            Log::debug($responseObj->body());

            $parts = explode("|", $responseObj->body());
            $response = [
                'code' => $parts[0],
                'number' => $parts[1] ?? null,
                'message_id' => $parts[2] ?? null
            ];

            $last_messageid = null;
            $last_status = null;
            $last_status_group_id = null;
            $failures = array();

            if( $response['code'] == '1701' ) {
                $last_messageid = $response['message_id'];
                $last_status_group_id = 1;

            } else {
                $last_status_group_id = 5;
                $failures[] = [
                    'to' => $to,
                    'last_status' => $response['code']
                ];
            }

            SmsLog::logMsg($sender_id, $to, $text, $last_messageid, $last_status_group_id);

            return array(
                'status' => 'success',
                'last_message_id' => $last_messageid,
                'last_status' => $last_status,
                'response' => $response,
                'failures' => $failures,
                'status_code' => $last_status_group_id
            );

        } catch (\Exception $ex) {
            return array('status' => 'error', 'message' => $ex->getMessage(), 'error' => $ex->getTraceAsString());
        }
    }

}
