<?php

/*
 * This file is part of the Slim Api Base package.
 *
 * Copyright (c) 2017 Inderjeet Kaler
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$config = [
    'settings' => [
        
        // Slim Settings
        'environment' => 'development', // development or testing or production
        'displayErrorDetails' => true, // set 'false' for production
        'determineRouteBeforeAppMiddleware' => false,
        
        /*
        // View settings
        'view' => [
            'template_path' => __DIR__ . '/resources/views',
            'twig' => [
                'cache' => __DIR__ . '/../cache/twig',
                'debug' => true,
                'auto_reload' => true,
            ],
        ],
        */

        // Monolog settings
        'logger' => [
            'name' => 'slimapi',
            'level' => Monolog\Logger::DEBUG,
            'path' => __DIR__ . '/../logs/app.log',
        ],

        // Database settings
        'database' => [
            'host' => 'localhost',
            'data' => 'database_name',
            'user' => '',
            'pass' => '',
        ],
    ],
];