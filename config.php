<?php

return [
    'database' => [
        'name' => 'pre_test',
        'username' => 'root',
        'password' => '',
        'connection' => 'mysql:host=localhost',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
        ],
    'google' => [
        'GOOGLE_CLIENT_ID' => '1096241818411-cq54uuabs55dqfbdcb2lhfbrar8nb6vm.apps.googleusercontent.com',
        'GOOGLE_CLIENT_SECRET' => 'QlM2DM6e8t7ZSTGoAnAMWHiE',
        'GOOGLE_REDIRECT_URL' => 'http://localhost:8080/gmail',
    ]
];