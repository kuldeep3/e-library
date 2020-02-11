<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PasswordMail
{
    public $mail;
    public function __construct()
    {
        $this->mail = new PHPMailer;
        $this->mail->isSMTP();
        $this->mail->Host = 'ssl://smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'warlord74300@gmail.com';
        $this->mail->Password = 'kul.1212221';
        $this->mail->SMTPSecure = 'ssl';
        $this->mail->Port = 465;
    }

    public function sendMail($email,$hash,$name)
    {
        $this->mail->setFrom('warlord74300@gmail.com', 'E-Library Team');
        $this->mail->addAddress($email);
        $this->mail->Subject = "Password Reset for E-Library Account";
        $this->mail->isHTML(true);
        $this->mail->SMTPDebug = 0;
        $this->base_url = "http://ec2-3-6-47-234.ap-south-1.compute.amazonaws.com/reset?email=${email}&hash=${hash}";
        $this->mailContent = 
            'Hi ' . $name . ', <br/> <br/> We received a request to reset your password for your E-Library account: 
        <br/> <br/> ' .
        $email . '. We are here to help!
            <br/> <br/>
            Simply click on the link to set a new password:
            <br/> <br/>
            <a class="btn btn-outline-success" href=" '. $this->base_url . ' "  role="button">Set a New Password</a>
            <br/> <br/>
            If you did not ask to change your password, do not worry! Your password is still
            <br/> <br/>
            safe and you can delete this mail.
            <br/> <br/>
            Cheers,
            <br/>
            E-Library Team
            ';
        $this->mail->Body = $this->mailContent;
        if (!$this->mail->send()) {
            echo 'Message could not be sent';
            echo 'Mailer Error: ' . $this->mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }
}
