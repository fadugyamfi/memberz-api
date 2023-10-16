<?php

return [

    /**
     * ConnectBind SMS Service Credentials
     */
    'connectbind' => [
        'username' => env('CONNECT_BIND_USERNAME', 'txg-memberzo'),
        'password' => env('CONNECT_BIND_PASSWORD', 'MzSMS01!'),
        'fake_requests' => env('CONNECT_BIND_FAKER_ENABLED', false),
    ],

    'smsonlinegh' => [
        'send_url' => 'https://api.smsonlinegh.com/v5/sms/send',
        'api_key' => env('SMSONLINEGH_APIKEY', '0292b8abda1c1a2574a0ec8e56056e201dfd9c058541d03dad55cefd42146d2c')
    ]
];
