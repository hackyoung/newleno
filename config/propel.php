<?php
return [
    'propel' => [
        'database' => [
            'connections' => [
                'leno' => [
                    'adapter' => 'pgsql',
                    'classname' => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn' => 'pgsql:host=localhost;dbname=leno',
                    'user' => 'young',
                    'password' => 'yang159357789',
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
