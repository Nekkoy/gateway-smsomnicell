<?php

return [
    "enabled" => env('SMSOMNICELL_ENABLED', false),
    "login" => env('SMSOMNICELL_LOGIN', ''),
    "password" => env('SMSOMNICELL_PASSWORD', ''),
    "name_sms" => env('SMSOMNICELL_SMS_NAME', ''),
    "description" => env('SMSOMNICELL_DESCRIPTION', ''),
    "priority" => env('SMSOMNICELL_PRIORITY', 1),
    "prefix" => env('SMSOMNICELL_PREFIX', "any"),
    "tags" => env('SMSOMNICELL_TAGS', '#mobizone'),
    "default" => env('SMSOMNICELL_DEFAULT', false),
    "devmode" => env('SMSOMNICELL_DEVMODE', false),
];
