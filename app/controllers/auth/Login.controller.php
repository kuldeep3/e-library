<?php


require 'app/views/auth/Login.view.php';

if (isset($_POST['login'])) {
    var_dump($app['database']->verifyUser($_POST['email']));
} else {
    return 'please try again later';
}