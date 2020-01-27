<?php

require 'app/views/auth/Signup.view.php';

if (isset($_POST['register'])) {
    App::get('database')->insertUsers($_POST['name'],$_POST['email'],$_POST['password']);
} else {
    return 'please try again later';
}
// App::get('database')->insertUsers();

// var_dump($app['database']->googleLogin());
