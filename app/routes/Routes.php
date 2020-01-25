<?php

// $request = trim($_SERVER['REQUEST_URI'], '/');

// switch ($request) {
//     case '/':
//         require __DIR__ . '/'.'../controllers/auth/Signup.controller.php';
//         break;
//     case '':
//         require __DIR__ . '/'.'../controllers/auth/Signup.controller.php';
//         break;
//     case 'login':
//         require __DIR__ . '/'.'../controllers/auth/Login.controller.php';
//         break;
//     default:
//         http_response_code(404);
//         break;
// }

$router->define([
    '' => 'app/controllers/auth/Signup.controller.php',
    'login' => 'app/controllers/auth/Login.controller.php'
]);
