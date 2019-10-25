<?php

return [
    '__name' => 'api-banner',
    '__version' => '0.0.1',
    '__git' => 'git@github.com:getmim/api-banner.git',
    '__license' => 'MIT',
    '__author' => [
        'name' => 'Iqbal Fauzi',
        'email' => 'iqbalfawz@gmail.com',
        'website' => 'http://iqbalfn.com/'
    ],
    '__files' => [
        'modules/api-banner' => ['install','update','remove']
    ],
    '__dependencies' => [
        'required' => [
            [
                'banner' => NULL
            ],
            [
                'api' => NULL
            ],
            [
                'lib-app' => NULL
            ]
        ],
        'optional' => []
    ],
    'autoload' => [
        'classes' => [
            'ApiBanner\\Controller' => [
                'type' => 'file',
                'base' => 'modules/api-banner/controller'
            ]
        ],
        'files' => []
    ],
    'routes' => [
        'api' => [
            'apiBannerIndex' => [
                'path' => [
                    'value' => '/banner'
                ],
                'method' => 'GET',
                'handler' => 'ApiBanner\\Controller\\Banner::index'
            ],
            'apiBannerSingle' => [
                'path' => [
                    'value' => '/banner/(:identity)',
                    'params' => [
                        'identity' => 'any'
                    ]
                ],
                'method' => 'GET',
                'handler' => 'ApiBanner\\Controller\\Banner::single'
            ]
        ]
    ]
];