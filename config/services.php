<?php

return [

    // Social login providers credentials.

    'facebook' => [
        'client_id' => env('SIGN_IN_W_FACEBOOK_CLIENT_ID'),
        'client_secret' => env('SIGN_IN_W_FACEBOOK_CLIENT_SECRET'),
        'redirect' => env('APP_URL') . '/oauth/facebook/callback',
    ],

    'google' => [
        'client_id' => env('SIGN_IN_W_GOOGLE_CLIENT_ID'),
        'client_secret' => env('SIGN_IN_W_GOOGLE_CLIENT_SECRET'),
        'redirect' => env('APP_URL') . '/oauth/google/callback',
    ],
];
