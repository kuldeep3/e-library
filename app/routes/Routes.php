<?php

$router->define([
    '' => 'app/controllers/auth/Signup.controller.php',
    'login' => 'app/controllers/auth/Login.controller.php',
    'gmail' => 'app/controllers/auth/GmailAuth.controller.php'
]);
// $router->post('' , 'app/controllers/auth/Signup.controller.php');
// $router->get('login', 'app/controllers/auth/Login.controller.php');
