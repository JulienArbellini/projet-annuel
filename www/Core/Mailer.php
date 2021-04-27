<?php
namespace App;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';
// echo !extension_loaded('openssl')?"Not available":"Available";

$mail = new PHPMailer(true);
try{
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'ssl://smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'teachr.contact.pa@gmail.com';
    $mail->Password = 'teachr_pa_2021';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 465;
    $mail->setFrom('teachr.contact.pa@gmail.com', 'Teachr Contact');
    $mail->addAddress('waruny@hotmail.fr', 'Waruny Rajendran');

    //Attachments
    $mail->addAttachment('../teachr.sql');         //Add attachments
    
    $mail->isHTML(true);
    $mail->Subject = 'Test de PHP Mailer';
    $mail->Body    = 'Test de <b>PHP Mailer</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    echo 'Message has been sent';
}
catch (Exception $e){
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}