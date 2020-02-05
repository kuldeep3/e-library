<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mail
{
    public $mail;
    public function __construct()
    {
        $this->mail = new PHPMailer;
        $this->mail->isSMTP();
        $this->mail->Host = 'ssl://smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = 'warlord74300@gmail.com';
        $this->mail->Password = 'qwerty1234ab.';
        $this->mail->SMTPSecure = 'ssl';
        $this->mail->Port = 465;
    }

    public function sendMail($lastID, $hash)
    {
        $this->mail->setFrom('warlord74300@gmail.com', 'Arcenmities');
        $this->mail->addAddress($_POST['email']);
        $this->mail->Subject = "Verification link";
        $this->mail->isHTML(true);
        $this->mail->SMTPDebug = 3;
        $this->base_url = "http://localhost/activation?hash=${hash}&id={$lastID}";
        $this->mailContent = 'Hi, <br/> <br/> We need to make sure you are human. Please verify your email and get started using your account.
            <br/> <br/> <a href ="'.$this->base_url.'">Click here to verify.</a>
        ' ;
        $this->mail->Body = $this->mailContent;
        if (!$this->mail->send()) {
            echo 'Message could not be sent';
            echo 'Mailer Error: ' . $this->mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }
}
