<?php
if (isset($_POST['reset'])) {
    $email = $_POST['email'];
    $user = App::get('databaseUser')->forgotPassword($email);
    $user->execute();
    $res = $user->fetch(PDO::FETCH_ASSOC);
    $name = $res['name'];
    $hash = $res['hash'];
    if ($user->rowcount() == 1) {
        $mail = new PasswordMail();
        $mail->sendMail($email,$hash,$name);
        header('location:/message');
    } else {
        echo "No account found with this email";
    }
}