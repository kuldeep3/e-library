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
        $this->mail->Password = 'kul.1212221';
        $this->mail->SMTPSecure = 'ssl';
        $this->mail->Port = 465;
    }

    public function sendMail($lastID, $hash)
    {
        $this->mail->setFrom('warlord74300@gmail.com', 'Arcenmities');
        $this->mail->addAddress($_POST['email']);
        $this->mail->Subject = "Verification link for E-Library";
        $this->mail->isHTML(true);
        $this->mail->SMTPDebug = 0;
        $this->base_url = "http://ec2-3-6-47-234.ap-south-1.compute.amazonaws.com/activation?hash=${hash}&id={$lastID}";
        $this->mailContent = 
            'Hi ' . $_POST['name'] . ', <br/> <br/> Thanks so much for joining E-library! To finish signing up, you just 
        <br/> <br/>
        need to confirm that we got your email right.
            <br/> <br/>
            <a class="btn btn-outline-success" href=" '. $this->base_url; '. "  role="button">Confirm Your Email</a>
            <br/> <br/>
            Button not working? Try pasting this link into your browser:
            <br/>' . $this->base_url;' ';
        $this->mail->Body = $this->mailContent;
        if (!$this->mail->send()) {
            echo 'Message could not be sent';
            echo 'Mailer Error: ' . $this->mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }
}
