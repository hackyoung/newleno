<?php
return [
    'propel' => [
        'database' => [
            'connections' => [
                'leno' => [
                    'adapter' => 'mysql',
                    'classname' => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn' => 'mysql:host=localhost;dbname=leno',
                    'user' => 'root',
                    'password' => 'young159357789',
                    'attributes' => []
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'leno',
            'connections' => ['leno']
        ],
        'generator' => [
            'defaultConnection' => 'leno',
            'connections' => ['leno']
        ]
    ]
];
