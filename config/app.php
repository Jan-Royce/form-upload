<?php

use Bayfront\Bones\Application\Utilities\App;

return [
    'namespace' => 'App\\', // Namespace for the app/ directory, as specified in composer.json
    'key' => App::getEnv('APP_KEY'), // Unique to the app, not to the environment
    'debug' => App::getEnv('APP_DEBUG'),
    'environment' => App::getEnv('APP_ENVIRONMENT'), // e.g.: "dev", "staging", "qa", "prod"
    'timezone' => App::getEnv('APP_TIMEZONE'), // See: https://www.php.net/manual/en/timezones.php
    // Begin app-specific config
    'version' => '1.0.0', // Current app version (string),
    's3_region' => App::getEnv('S3_REGION'),
    's3_host' => App::getEnv('S3_HOST'),
    's3_bucket' => App::getEnv('S3_BUCKET'),
    's3_access_key' => App::getEnv('S3_ACCESS_KEY'),
    's3_secret_key' => App::getEnv('S3_SECRET_KEY'),
    's3_use_cert' => App::getEnv('S3_USE_CERT')
];