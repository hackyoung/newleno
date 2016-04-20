<?php
return [
    'propel' => [
        'paths' => [
            // The directory where Propel expects to find your `schema.xml` file.
            'schemaDir' => '/var/www/html/newleno',
            // The directory where Propel should output generated object model classes.
            'phpDir' => '/var/www/html/newleno',
        ],
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
