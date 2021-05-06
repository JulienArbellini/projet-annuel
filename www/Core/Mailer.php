<?php
namespace App\Core;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use App\Core\Form;

class Mailer{

    public function mailer($to, $from, $from_name, $subject, $body){
        
        $mail = new PHPMailer();
    
        try{
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->IsSMTP();
            $mail->SMTPAuth = true; 
    
            $mail->SMTPSecure = 'ssl'; 
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->Username = 'teachr.contact.pa@gmail.com';
            $mail->Password = PHPMailer::PWD;  
    
    //   $path = 'reseller.pdf';
    //   $mail->AddAttachment($path);
    
            $mail->IsHTML(true);
            $mail->From=$_POST["email"];
            $mail->FromName=$from_name;
            $mail->Sender=$from;
            $mail->AddReplyTo($from, $from_name);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AddAddress($to);
            $mail->send();
            //echo "<script>alert(\"L\'invitation a bien été envoyée\")</script>";
        } catch (Exception $e){
                echo "Le message n'a pas pu être envoyé. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}