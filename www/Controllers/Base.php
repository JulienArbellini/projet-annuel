<?php

namespace App;

use App\Core\Security;
use App\Core\View;
use App\Models\User;


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
		$donnees = $userSelect->userShow();
		$view->assign("donnees", $donnees);
		$donnees = $userSelect->requestRole();
		$view->assign("donnees", $donnees);
	}

}