<?php

return [
    'default' => 'mysql',
    'mysql' => [
        'driver' => 'mysql',
        'host' => envGet("DB_HOST", "127.0.0.1"),
        'username' => envGet("DB_USER", "root"),
        'password' => envGet("DB_PASSWORD", 'password'),
        'database' => envGet("DB_NAME", 'testdb'),
    ],
];