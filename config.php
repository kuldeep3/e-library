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
        'GOOGLE_REDIRECT_URL' => 'http://ec2-3-6-47-234.ap-south-1.compute.amazonaws.com/gmail',
    ]
];