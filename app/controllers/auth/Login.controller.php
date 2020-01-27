<?php

require 'app/core/models/Google.php';
require 'app/views/auth/Login.view.php';

if (isset($_POST['login'])) {
    App::get('database')->verifyUser($_POST['email']);
} else {
    return 'please try again later';
}