<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

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
