<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'service_id' => env('WATCHER_SERVICE_ID'),
    'base_url' => env('WATCHER_BASE_URL'),
    'token' => env('WATCHER_TOKEN'),

    /*
     * The gdpr compliance level, can be one of the following: true | false
     * and the items to clean.
     *
     * If you set the gdpr compliance level to true, the items will be anonymized.
     */
    'gdpr' => [
        'compliant' => env('WATCHER_GDPR_COMPLIANT', false),
        'items' => env('WATCHER_GDPR_ITEMS', ['password', 'password_confirmation']),
    ]
];
