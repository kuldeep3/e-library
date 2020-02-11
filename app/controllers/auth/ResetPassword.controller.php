<?php
session_start();
$hash = $_SESSION["hash"];
$email = $_SESSION["email"];
if (isset($_POST['change'])) {
    $password = $_POST['password'];
    $verify_password = $_POST['verify_password'];

    if ($password != $verify_password) {
        echo "Password do not match";
    } else {
        $secured_password = password_hash($password, PASSWORD_BCRYPT);
        App::get('databaseUser')->resetPassword($hash, $email, $secured_password);
        header('location:/resetmsg');
    }
}
