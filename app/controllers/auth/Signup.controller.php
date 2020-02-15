<?php

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    if (empty(trim($_POST['name']))) {
        session_start();
        $name_err = "Please enter your name";
        $_SESSION["err"] = $name_err;
        header('location:/signup');
    } elseif (empty(trim($_POST['email']))) {
        session_start();
        $email_err = "Please enter your email";
        $_SESSION["err"] = $email_err;
        header('location:/signup');
    } elseif ($email) {
       !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email);
       session_start();
       $email_error = "Please enter valid email";
       $_SESSION["err"] = $email_error;
       header('location:/signup');  
       
    } elseif (empty($_POST['password'])) {
        session_start();
        $pass_err = "Please enter your password";
        $_SESSION["err"] = $pass_err;
        header('location:/signup');
    } elseif (empty($_POST['verify_password'])) {
        session_start();
        $pass_err = "Please enter your password";
        $_SESSION["err"] = $pass_err;
        header('location:/signup');
    } elseif (empty(trim($_POST['name'])) && empty(trim($_POST['email'])) && empty($_POST['password']) && empty($_POST['verify_password'])) {
        session_start();
        $error = "Please fill out the form";
        $_SESSION["err"] = $error;
        header('location:/signup');
    } else {
        App::get('databaseUser')->insertUsers($_POST['name'], $_POST['email'], $_POST['password']);
    }
} else {
    return 'please try again later';
}
