<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => 'These credentials do not match our records.',
    'throttle' => 'Too many login attempts. Please try again in :seconds seconds.',

    'multi-tenant' => [
        'header-missing' => 'X-Tenant-Id header missing. No organisation specified',
        'invalid' => 'Invalid organisation identifier specified in X-Tenant-Id header',
        'not-permitted' => 'You are not permitted to access resources for :org_name'
    ]
];
