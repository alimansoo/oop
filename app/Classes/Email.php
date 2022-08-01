<?php


namespace App\Classes;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Email
{
    protected $phpmailer = null;
    public function __construct()
    {
        $this->phpmailer = new PHPMailer();
        $this->phpmailer->isSMTP();
        $this->phpmailer->Host = 'smtp.mailtrap.io';
        $this->phpmailer->SMTPAuth = true;
        $this->phpmailer->Port = 2525;
        $this->phpmailer->Username = '2f4d16c76ae748';
        $this->phpmailer->Password = 'b5d2c34283f111';

        $this->phpmailer->setFrom('from@gmail.com', 'Your Hotel');
    }
    public function To($email){
        $this->phpmailer->addAddress($email, 'Me');
    }
    public function Content($subject,$html){
        $this->phpmailer->Subject = $subject;
        $this->phpmailer->isHTML(TRUE);
        $this->phpmailer->Body = $html;
        $this->phpmailer->AltBody = $html;
    }
    public function Send(){
        if(!$this->phpmailer->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $this->phpmailer->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }
    }
}