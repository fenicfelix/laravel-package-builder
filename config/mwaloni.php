<?php

return [
    'env' => env('MWALONI_ENV', 'sandbox'), // sandbox or production
    'debug' => env('MWALONI_DEBUG', true),
    'encryption_key' => env('MWALONI_ENCRYPTION_KEY', 'w4^dgd$%^62:)dgs'),
    'sandbox' => [
        'service_id' => env('MWALONI_SANDBOX_SERVICE_ID', 'SRV-00007'),
        'username' => env('MWALONI_SANDBOX_USERNAME', 'test-service'),
        'password' => env('MWALONI_SANDBOX_PASSWORD', 'w92TrlUMHR'),
    ],
    'production' => [
        'service_id' => env('MWALONI_SERVICE_ID', 'SRV-00007'),
        'username' => env('MWALONI_USERNAME', 'test-service'),
        'password' => env('MWALONI_PASSWORD', 'w92TrlUMHR'),
    ],
];
