<?php

namespace App;

use App\Core\Security;
use App\Core\View;
use App\Core\Database;
use App\Models\Article;


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
		$article = new Article();
		$donnees = $article->getArticle();
		$view->assign("donnees", $donnees);

		$article2 = new Article();
		$article2->deleteArticle();
		//$view->assign("test", $test);

		// $delete_article = new Article();
		// $donnees_af_supp = $delete_article->deleteArticle();

		//$delete_article = new Article();
		//$delete_article->getId();
		//$delete_article->deleteArticle();
	}


}