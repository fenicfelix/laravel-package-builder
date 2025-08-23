<?php
$environment = env('NCBA_ENV', 'sandbox');
$env_key = strtoupper($environment);
return [
    'env' => $environment, // sandbox or production
    'debug' => env('NCBA_DEBUG', true),
    'api_key' => env('NCBA_' . $env_key . '_API_KEY', 'T3st123'),
    'username' => env('NCBA_' . $env_key . '_USERNAME', 'sandbox_user'),
    'password' => env('NCBA_' . $env_key . '_PASSWORD', 'sandbox_password'),
    'url' => env('NCBA_' . $env_key . '_URL', 'https://apidev.ncbagroup.com/api/v1'),
];

/*
 * ENVIRONMENT VARIABLES
 *
 * NCBA_ENV
 * NCBA_DEBUG
 * NCBA_SANDBOX_API_KEY
 * NCBA_SANDBOX_USERNAME
 * NCBA_SANDBOX_PASSWORD
 * NCBA_SANDBOX_URL
 * NCBA_PRODUCTION_API_KEY
 * NCBA_PRODUCTION_USERNAME
 * NCBA_PRODUCTION_PASSWORD
 * NCBA_PRODUCTION_URL
 */
