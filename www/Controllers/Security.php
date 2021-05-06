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
		$mailer = new Mailer();
		$form = $user->buildFormRegister();
		$view->assign("form", $form);
		
		if(!empty($_POST)){
			$user->verifMailUniq();
			$errors = Form::validator($_POST, $form);
			
			if(empty($errors)){
				$user->setFirstname(htmlspecialchars($_POST["firstname"]));
				$user->setLastname(htmlspecialchars($_POST["lastname"]));
				$user->setEmail(htmlspecialchars($_POST["email"]));
				$user->setPwd(password_hash(htmlspecialchars($_POST["pwd"]), PASSWORD_BCRYPT));
				$user->setCreatedAt(date("Y-m-d H:i:s"));
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

	public function loginAction(){
		echo "controller security action login";
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