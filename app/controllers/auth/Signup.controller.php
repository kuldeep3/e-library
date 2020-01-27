<?php

require 'app/views/auth/Signup.view.php';

if (isset($_POST['register'])) {
    $app['database']->insertUsers($_POST['name'],$_POST['email'],$_POST['password']);
} else {
    return 'please try again later';
}

// var_dump($app['database']->googleLogin());
