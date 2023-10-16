<?php

namespace App\Services\Sms;

interface SmsServiceProvider {

    public function send(string $to, string $message, string $sender_id): array;
}
