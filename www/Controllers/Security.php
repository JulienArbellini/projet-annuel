<?php

namespace App;

use App\Core\Security as coreSecurity;
use App\Core\Database;
use App\Core\View;
use App\Core\Form;
use App\Core\ConstantManager;
use App\Models\User;
use App\Core\Mailer;

class Security{



	public function defaultAction(){
		echo "controller security action default";
	}


	public function registerAction(){


		$user = new User();
		$view = new View("register");
		$form = $user->buildFormRegister();
		$view->assign("form", $form);

		if(!empty($_POST)){
			$errors = Form::validator($_POST, $form);

			if(empty($errors)){
				
				$user->setFirstname($_POST["firstname"]);
				$user->setLastname($_POST["lastname"]);
				$user->setEmail($_POST["email"]);
				$user->setPwd($_POST["pwd"]);

			}else{
				$view->assign("formErrors", $errors);
			}

		}
		
	}

	public function loginAction(){
		$user = new User();
		$view = new View("login");
		$form = $user->buildFormLogin();
		$view->assign("form", $form);
		session_start();
		if(isset($_POST['email']) && isset($_POST['pwd']))
		{
			$email = htmlspecialchars($_POST['email']); 
			$password = htmlspecialchars($_POST['pwd']);
			
			if($email !== "" && $password !== "")
			{
				if($user->checkPwd($password, $email)) // nom d'utilisateur et mot de passe correctes
				{
					$_SESSION['prenom'] = $user->getPseudo($email);
					$user->connectedOn($email);
					$_SESSION['loggedIn']=true;
					header('Location: \tableau-de-bord');
				}
				else
				{
					header('Location: \login?erreur=1'); // utilisateur ou mot de passe incorrect
				}
			}
			else
			{
				
				header('Location: \login?erreur=2'); // utilisateur ou mot de passe vide
			}
		}					
	}

	public function recuperationAction(){
		$user = new User();
		$view = new View("recuperationmdp");
		$mailer = new Mailer();
		$form = $user->buildFormRecuperation();
		$view->assign("form", $form);
		if(!empty($_POST)){
			$user->verifMail();
			$errors = Form::validator($_POST, $form);
			if(empty($errors)){
				$password = uniqid();
				$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
				$message = "Bonjour, voici votre code de récupération: $password";
				$to   = $_POST["recup_mail"];
				$from = 'teachr.contact.pa@gmail.com';
				$name = 'Teachr';
				$subj = 'Mot de passe oublié';
				if($mailer->mailer($to,$from, $name ,$subj, $message)){
					$user->createConfirmationKey($password, $to);
					header('Location: \changement-mdp');
				}
			}
		}
	}

	public function changementmdpAction(){
		
		$user = new User();
		$view = new View("changementmdp");
		$form = $user->buildFormChangementMdp();
		$view->assign("form", $form);
		if(!empty($_POST['confirmation_key'])){
			echo 'test';
			if($user->checkConfirmationKey($_POST['confirmation_key']) && $user->checkConfirmationKeyTmtp($_POST['confirmation_key'])){
				echo 'ok';
				$id = $user->getUserId($_POST['confirmation_key']);
				if(isset($_POST['pwdConfirm']) && isset($_POST['pwd'])){
					$errors = Form::validator($_POST['pwd'], $form);
					if(!empty($errors) && $_POST['pwdConfirm']===$_POST['pwd']){
						$user->updatePwd($id, $_POST['pwd']);
						echo 'Votre mot de passe a bien été enregistré';
						$user->deleteConfirmationKey($_POST['confirmation_key'],$id);
						header('Location: \login');
					}
				}
			}else{
				echo 'not ok';
			}
		}
	}
	
	public function logoutAction(){
		echo "controller security action logout";
	}

	public function listofusersAction(){

		$security = new coreSecurity(); 
		if(!$security->isConnected()){
			die("Error not authorized");
		}

		echo "Là je liste tous les utilisateurs";
	}

}