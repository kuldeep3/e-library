<?php
if (isset($_POST['reset'])) {
    $email = $_POST['email'];
    $user = App::get('databaseUser')->forgotPassword($email);
    var_dump($user);
    die();
    $user->execute();
    if ($user->rowcount() == 1) {
        $mail = new PasswordMail();
        $mail->sendMail($email,$hash);
        header('location:/message');
    } else {
        echo "No account found with this email";
    }
}