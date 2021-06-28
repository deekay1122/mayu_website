<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'appId' => env('FACEBOOK_APP_ID'),
        'apiVersion' => env('FACEBOOK_API_VERSION'),
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
    ],

    'paypal' => [
        'sandbox_client_id' => env('PAYPAL_SANDBOX_CLIENT_ID'),
        'sandbox_client_secret' => env('PAYPAL_SANDBOX_CLIENT_SECRET'),
        'sandbox_book_club_monthly_subscription_plan_id' => env('PAYPAL_SANDBOX_BOOK_CLUB_MONTHLY_SUBSCRIPTION_PLAN_ID'),
        'sandbox_book_club_zoom_monthly_subscription_plan_id' => env('PAYPAL_SANDBOX_BOOK_CLUB_ZOOM_MONTHLY_SUBSCRIPTION_PLAN_ID'),
        'live_client_id' => env('PAYPAL_LIVE_CLIENT_ID'),
        'live_client_secret' => env('PAYPAL_LIVE_CLIENT_SECRET'),
        'currency' => env('PAYPAL_CURRENCY'),
    ]

];
