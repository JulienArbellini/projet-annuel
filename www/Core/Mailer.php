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
            $mail->IsSMTP();
            $mail->SMTPAuth = true; 
    
            $mail->SMTPSecure = 'ssl'; 
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->Username = 'teachr.contact.pa@gmail.com';
            $mail->Password = PHPMailer::PWD;  
    
            $mail->IsHTML(true);
            $mail->From=$_POST["email"];
            $mail->FromName=$from_name;
            $mail->Sender=$from;
            $mail->AddReplyTo($from, $from_name);
            $mail->Subject = $subject;
            $mail->Body = $body;
            $mail->AddAddress($to);
            return $mail->send();
        } catch (Exception $e){
                echo "Le message n'a pas pu être envoyé. Mailer Error: {$mail->ErrorInfo}";
        }
    }


    public function sendMailUser(){

        $mail = new PHPMailer(true);
            try{
                $mail->isSMTP();
                $mail->Host = 'ssl://smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'teachr.contact.pa@gmail.com';
                $mail->Password = PHPMailer::PWD;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 465;
                $mail->setFrom('teachr.contact.pa@gmail.com', 'Teachr Contact');
                $mail->addAddress($_SESSION['tab'][0]['email'], $_SESSION['tab'][0]['pseudo']);
                $mail->isHTML(true);
                $mail->Subject = 'Invitation à rejoindre un projet';
                $mail->Body    = '<html>
                                    <head>
                                        <meta charset= "UTF-8"/>
                                    </head>
                                    <body>
                                        <h1>Bienvenue sur Teachr !</h1></br>
                                        <p>L\'utilisateur <strong>'.$_SESSION['gestionRole'][0]['firstname'].' '.$_SESSION['gestionRole'][0]['lastname'].'</strong> vous invite à rejoindre son projet sur notre plateforme.</br>
                                        Pour y accéder, rendez-vous à l\'adresse suivante : <p style="text-decoration:underline; color:blue;"> '.$_SERVER['HTTP_ORIGIN'].'/changement-mdp</p></br>
                                        Renseignez le code de confirmation inscrit ci-dessous pour pouvoir créer un mot de passe</p></br>
                                        <p>Vos identifiants de connexion :</p>
                                            <ol style="list-style: none;">
                                                <li> - Identifiant : '.$_SESSION['tab'][0]['email'].'</li>
                                                <li> - Code de confirmation : '.$_SESSION['tab'][0]['code_confirmation_mdp'].'</li>
                                            </ol>
                                            <p style="color: red; font-weight: bold;">Attention ce code est temporaire (3 heures), il sert uniquement à la création d\'un mot de passe et ne peut être utilisé qu\'une seule fois ! </p></br>
                                            <p>Toute l\'équipe vous souhaite la bienvenue sur teachr</br><p>
                                    </body>
                                </html>';
                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                $mail->send();
                echo "<script>alert(\"L\'invitation a bien été envoyée\")</script>";
            }
            catch (Exception $e){
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
    }
}