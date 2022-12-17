<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'service_id' => env('FREE_ET4_SERVICE_ID'),
    'base_url' => env('FREE_ET4_BASE_URL'),
    'token' => env('FREE_ET4_TOKEN'),

    /*
     * The gdpr compliance level, can be one of the following: true | false
     * and the items to clean.
     *
     * If you set the gdpr compliance level to true, the items will be anonymized.
     */
    'gdpr' => [
        'compliant' => env('FREE_ET4_GDPR_COMPLIANT', false),
        'items' => env('FREE_ET4_GDPR_ITEMS', ['password', 'password_confirmation']),
    ]
];
