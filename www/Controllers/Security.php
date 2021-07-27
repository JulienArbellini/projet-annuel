<?php

namespace App;

use App\Core\Security as coreSecurity;
use App\Core\Database;
use App\Core\View;
use App\Core\Form;
use App\Core\ConstantManager;
use App\Core\AddArticleForm;
use App\Models\User;
use App\Models\Article;
use App\Core\Mailer;

class Security{


	/* ----- INSCRIPTION ----- */

	public function registerAction(){
		$user = new User();
		$view = new View("register");
		$mailer = new Mailer();
		$form = $user->buildFormRegister();
		$view->assign("form", $form);
		if(!empty($_POST)){
			$user->verifMailUniq();
			$errors = Form::validator($_POST, $form);
			if(empty($errors)){
				
				$user->setFirstname(htmlspecialchars($_POST["firstname"]));
				$user->setLastname(htmlspecialchars($_POST["lastname"]));
				$user->setPseudo(htmlspecialchars($_POST["pseudo"]));
				$user->setEmail(htmlspecialchars($_POST["email"]));
				$user->setPwd(password_hash(htmlspecialchars($_POST["pwd"]), PASSWORD_BCRYPT));
				$user->setCreatedAtUser(date("Y-m-d H:i:s"));
				$confirmKey = mt_rand(1000000, 9000000);
				$user->setConfirmKey($confirmKey);

				$user->save();

				$to   = $_POST["email"];
				$from = 'teachr.contact.pa@gmail.com';
				$name = 'Teachr';
				$subj = 'Email de confirmation de compte';
				$msg = '
				<html>
					<body>
						<a href = "'.$_SERVER['HTTP_ORIGIN'].'/confirmation?id='.$_SESSION['id'].'&key='.$confirmKey.'">Confirmez votre e-mail</a>
					</body>
				<html>
				';
				$mailer->mailer($to,$from, $name ,$subj, $msg);
				
				header("Location: /login");
				
			} else{
				$view->assign("formErrors", $errors);
			}

		}
	}		

	public function confirmationAction() {
		$user = new User();
		$user->confirmation();
	}

	/* ----- CONNEXION ----- */

	public function loginAction(){
		$user = new User();
		$view = new View("login", "login");
		$form = $user->buildFormLogin();
		$view->assign("form", $form);

		if(isset($_POST['email']) && isset($_POST['pwd']))
		{
			$email = htmlspecialchars($_POST['email']); 
			$password = htmlspecialchars($_POST['pwd']);
			if($email !== "" && $password !== "")
			{
				if($user->checkPwd($password, $email)) // nom d'utilisateur et mot de passe corrects
				{
					$user = $user->getUserByMail($email);
					if ($user->verifConfirmed())
					{
						$_SESSION['id'] = $user->getId();
						$_SESSION['pseudo'] = $user->getPseudo($email);
						$user->connectedOn($email);
						$_SESSION['loggedIn']=true;
						$_SESSION['avatar'] = $user->getAvatar();
						$_SESSION['email'] = $user->getEmail();
						$_SESSION['prenom'] = $user->getFirstnameByEmail($email);
						$_SESSION['loggedIn']=true;
						$_SESSION['count']=0;
						
						$user->connectedUserId();
						header('Location: \tableau-de-bord');
						
					}
					else {
						echo "<center><p style='color:red'>Veuillez valider votre compte à l'aide du code de confirmation reçu dans votre boîte de réception</p></center>";
					}
					
				}
				else
				{
					header('Location: \login?erreur=1'); // utilisateur ou mot de passe incorrect
				}			
			}
			else
			{
				
				header('Location: \login?id=erreur=2'); // utilisateur ou mot de passe vide
			}
		}					
	}

	/* ----- DECONNEXION ----- */

	public function logoutAction(){
        $user = new User();

        if(isset($_GET['deconnexion']))
        { 
            
           if($_GET['deconnexion']==true)
           {    
                session_unset();
                header('Location: \login');
                $user->connectedOff();
           }
        }
    }

	/* ----- RECUPERATION MOT DE PASSE ----- */

	public function recuperationAction(){
		$user = new User();
		$view = new View("recuperationmdp", "login");
		$mailer = new Mailer();
		$form = $user->buildFormRecuperation();
		$view->assign("form", $form);
		if(!empty($_POST)){			
			$verifMail = $user->verifMail();
			$errors = Form::validator($_POST, $form);
			if(empty($errors) && $verifMail == 1){ 
				$password = uniqid();
				$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
				$message = "Bonjour, voici votre code de récupération: $password";
				$to   = $_POST["email"];
				$from = 'teachr.contact.pa@gmail.com';
				$name = 'Teachr';
				$subj = 'Mot de passe oublié';
				if($mailer->mailer($to,$from, $name ,$subj, $message)){
					$user->createConfirmationKey($password, $to);
					header('Location: \changement-mdp');
				}
				else
				{
					header('Location: \mot-de-passe-oublie?erreur=1'); // erreur lors de l'envoi du mail
				}
			}
			else
			{
				
				header('Location: \mot-de-passe-oublie?erreur=2'); // Ce mail n'existe pas dans la base de données
			}
		}
	}

	public function changementmdpAction(){
		
		$user = new User();
		$view = new View("changementmdp", "login");
		$form = $user->buildFormChangementMdp();
		$view->assign("form", $form);
		if(!empty($_POST['confirmation_key'])){
			if($user->checkConfirmationKey($_POST['confirmation_key']) && $user->checkConfirmationKeyTmtp($_POST['confirmation_key'])){
				$id = $user->getUserId($_POST['confirmation_key']);
				if(isset($_POST['pwdConfirm']) && isset($_POST['pwd'])){
					$errors = Form::validator($_POST['pwd'], $form);
					if(!empty($errors) && $_POST['pwdConfirm']===$_POST['pwd']){
						$user->updatePwd($id, $_POST['pwd']);
						echo 'Votre mot de passe a bien été enregistré';
						$user->deleteConfirmationKey($_POST['confirmation_key'],$id);
						header('Location: \login?id='.$_SESSION['id']);
					}
				}
			}else{
				echo 'Votre code de confirmation est incorrect';
			}
		}
	}

}