<?php

return [

    /**
     * ConnectBind SMS Service Credentials
     */
    'connectbind' => [
        'username' => env('CONNECT_BIND_USERNAME', 'txg-memberzo'),
        'password' => env('CONNECT_BIND_PASSWORD', 'MzSMS01!'),
        'fake_requests' => env('CONNECT_BIND_FAKER_ENABLED', false),
    ]
];
