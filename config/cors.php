<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */
    'paths' => ['*', 'sanctum/csrf-cookie', 'api/*', 'v1/*', 'login', 'register'],

    'allowed_methods' => ['*', env('CORS_ALLOWED_METHODS', 'GET, POST, PUT, DELETE, OPTIONS, PATCH')],

    'allowed_origins' => ['*', env('CORS_ALLOWED_ORIGINS', 'http://localhost:3000')],

    'allowed_origins_patterns' => ['*'],

    'allowed_headers' => explode(',', env('CORS_ALLOWED_HEADERS', 'Content-Type, Authorization, X-Requested-With, Accept, Origin, X-CSRF-TOKEN')),

    'exposed_headers' => ['*'],

    'max_age' => env('CORS_MAX_AGE', 0),

    'supports_credentials' => env('CORS_ALLOWED_CREDENTIALS', false),

];
