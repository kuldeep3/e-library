<?php
session_start();
$hash = $_SESSION["hash"];
$email = $_SESSION["email"];
if (isset($_POST['change'])) {
    $password = $_POST['password'];
    $verify_password = $_POST['verify_password'];
    $pass_err = $verify_pass_err = "";
    if (empty($password)) {
        $pass_err = "Please enter password";
        $_SESSION["err"] = $pass_err;
        header('location:/reset');
    }
    if (empty($password)) {
        $error = "Please enter password";
        $_SESSION["err"] = $error;
        header('location:/reset');
    }
    if ($password != $verify_password) {
        $error = "Password do not match";
        $_SESSION["err"] = $error;
        header('location:/reset');
    } else {
        if (!empty($password) && !empty($verify_password)) {
            $secured_password = password_hash($password, PASSWORD_BCRYPT);
            App::get('databaseUser')->resetPassword($hash, $email, $secured_password);
            header('location:/resetmsg');
        }
    }
}
