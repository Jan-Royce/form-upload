<?php

/*
 * For more information, see:
 * https://github.com/bayfrontmedia/bones-service-webapp/blob/master/docs/setup.md#configuration
 */

return [
    'locale' => [ // Locale settings
        'enabled' => true,
        'valid' => [ // Valid locales for which translations exist
            'en',
            'es'
        ],
        'default' => 'en', // Default locale
        'cookie' => [
            'name' => 'locale', // Cookie name
            'duration' => 43200 // Cookie duration (in minutes): 43200 = 30 days
        ],
        'routes' => [
            'redirect' => true, // Add locale to routes?
            'exclude' => [ // Excluded requests from locale processing
                'hosts' => [], // Hosts
                'paths' => [ // URL paths
                    '/api'
                ],
                'param' => 'locale_exclude' // Route parameter
            ]
        ]
    ],
    'public' => [ // Added to Veil data array with key of "webapp"
        'brand' => [
            'name' => 'Bayfront Media',
            'logo' => 'https://cdn1.onbayfront.com/bfm/brand/bfm-logo.svg'
        ]
    ]
];