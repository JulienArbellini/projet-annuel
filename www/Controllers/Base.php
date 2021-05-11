<?php

namespace App;

use App\Core\Security;
use App\Core\View;
use App\Core\Form;
use App\Models\User;
use App\Core\Database;
use App\Core\Mailer;


class Base{


	public function defaultAction(){

		//Je vais cherche en bdd le pseudo du user
		$pseudo = "Prof";

		//Affiche moi la vue home;
		$view = new View();
		$view->assign("pseudo", $pseudo);
		$view->assign("age", 17);
		$view->assign("genre", "h");

		//envoyer le pseudo à la vue
	}


	//Must be connected
	public function dashboardAction(){
		
		$security = new Security(); 
		if(!$security->isConnected()){
			die("Error not authorized");
		}


		//Affiche moi la vue dashboard;
		$view = new View("dashboard", "back");
		
	
	}

	public function articlesAction(){
		$view = new View("articles", "back");
	}

	public function usersAction(){
		$view = new View("users", "back");
		$userSelect = new User();
		$mailer = new Mailer();

		// $donnees = $userSelect->userShow();
		// $view->assign("donnees", $donnees);

		$donnees = $userSelect->requestRole();
		$view->assign("donnees", $donnees);
		
		$userSelect->userDelete();

		$data = $userSelect->roleShow();
		$view->assign("data", $data);

		$form = $userSelect->buildFormAddUser();
		$view->assign("form", $form);

		if(!empty($_POST)){
			$errors = Form::validator($_POST, $form);

			if(empty($errors)){
				$userSelect->setFirstname($_POST["firstname"]);
				$userSelect->setLastname($_POST["lastname"]);
				$userSelect->setEmail($_POST["email"]);
				$userSelect->setPseudo($_POST["pseudo"]);
				$userSelect->setPassword($_POST["password"]);
				//password_hash($_POST["password"], PASSWORD_BCRYPT)
				$userSelect->setRole($_POST["role"]);
				$userSelect->save();
				// $userSelect->userMail();
				$test = $userSelect->userMail();
				// var_dump($test);
				// $userSelect->assignUser("test", $test);
				$mailer->mailer();
			}else{
				$view->assign("formErrors", $errors);
			}
		}

		// $userSelect->buildFormUpdateUser();
		// $view->assign("updateForm", $updateForm);
		
		// if(!empty($_POST)){
		// 	$errors = Form::validator($_POST, $form);
			
		if(!empty($_POST) && !empty($this->id)){
			$userSelect->setId($_GET["updateId"]);
			$userSelect->setLastname($_POST["lastname"]);
			$userSelect->setFirstname($_POST["firstname"]);
			$userSelect->setRole($_POST["role"]);
			// echo $_GET["updateId"];
			// echo $_POST["lastname"];
			// echo $_POST["firstname"];
			// echo $_POST["role"];
			$userSelect->updateUser();
		}
	}

}