<?php

namespace App;

use App\Core\Security as coreSecurity;
use App\Core\Database;
use App\Core\View;
use App\Core\Form;
use App\Core\ConstantManager;
use App\Models\User;

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
				// $user->setCountry("fr");
				$user->save();

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
		$db_username = 'root';
		$db_password = 'password';
		$db_name     = 'teachr';
		$db_host     = 'database';
		$db = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');

		if(isset($_POST['email']) && isset($_POST['pwd']))
		{
			$email = mysqli_real_escape_string($db,htmlspecialchars($_POST['email'])); 
			$password = mysqli_real_escape_string($db,htmlspecialchars($_POST['pwd']));
			
			if($email !== "" && $password !== "")
			{
				
				$requete = "SELECT count(*) FROM tr_user where 
					email = '".$email."' and password = '".$password."' ";
				$exec_requete = mysqli_query($db,$requete);
				$reponse      = mysqli_fetch_array($exec_requete);
				$count = $reponse['count(*)'];
				if($count!=0) // nom d'utilisateur et mot de passe correctes
				{
				$_SESSION['email'] = $email;
				header('Location: \tableau-de-bord');
				}
				else
				{
					echo "utilisateur ou mot de passe incorrect"; // utilisateur ou mot de passe incorrect
				}
			}
			else
			{
				
				echo "utilisateur ou mot de passe vide"; // utilisateur ou mot de passe vide
			}
		}
	
			
		mysqli_close($db); // fermer la connexion
		
		
		
	}

	public function recuperationAction(){
		$user = new User();
		$view = new View("recuperationmdp");
		$form = $user->buildFormRecuperation();
		$view->assign("form", $form);
		session_start();

		$bdd = new Database or die('could not connect to database');
		// echo $_POST['recup_submit'];
		if(isset($_POST['recup_submit'],$_POST['recup_mail'])) {
			if(!empty($_POST['recup_mail'])) {
				$mail = htmlspecialchars($_POST['recup_mail']);
				echo 'not empty';
				if(filter_var($mail,FILTER_VALIDATE_EMAIL)) {
					echo "OK";
				} else {
					echo "Adresse mail invalide";
					// $error = "Adresse mail invalide";
				}
			} else {
				// $error = "Veuillez entrer votre adresse mail";
				echo 'vide';
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