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

    'google' => [
        'client_id' => env('GoogleClientId'),
        'client_secret' => env('GoogleClientSecret'),
        'redirect' => env('GoogleCallBack')
    ],

    'linkedin' => [
        'client_id' => env('LinkedinClientId'),
        'client_secret' => env('LinkedinClientSecret'),
        'redirect' => env('LinkedinCallBack'),
        'auth_base_url' => 'https://www.linkedin.com/oauth/v2/',
        'openid_connect' => true,
    ],

    'facebook' => [
        'client_id' => env('FacebookClientId'),
        'client_secret' => env('FacebookClientSecret'),
        'redirect' => env('FacebookCallBack')
    ],
    'openai' => [
        'api_key' => env('OPENAI_API_KEY'),
    ],
    'recaptcha' => [
        'key' => env('RECAPTCHA_SITE_KEY'),
        'secret' => env('RECAPTCHA_SECRET_KEY'),
    ]


];
