<?php
return [
    'driver' => env('REVERB_DRIVER', 'pusher'),
    'host' => env('REVERB_HOST', '127.0.0.1'),
    'port' => env('REVERB_PORT', 8080),
    'scheme' => env('REVERB_SCHEME', 'http'),
    'key' => env('REVERB_KEY'),
    'secret' => env('REVERB_SECRET'),
    'app_id' => env('REVERB_APP_ID'),

    'options' => [
        'cluster' => env('REVERB_CLUSTER', 'mt1'),
        'useTLS' => true,
    ],
];