<?php

namespace App;

use App\Core\Security;
use App\Core\View;
use App\Core\Database;
use App\Models\Article;
use App\Models\Page;


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

	}

	public function editArticleAction(){
		$view = new View("edit-article", "back");
		$article = new Article();
		// $donnees = $article->getArticle();
		// $view->assign("donnees", $donnees);

		$data = $article->getContent();
		$view->assign("data", $data);

		if(!empty($_POST)){ 
			//echo "coucou";
			$article->setId($_GET['idArticle']);
			$article->setTitle($_POST["titre_article"]);
			$article->setSlug($_POST["slug_article"]);
			$article->setContent($_POST["contenu_article"]);
			$article->setCreatedAt(date("Y-m-d H:i:s"));
			$article->save();
	   }
	}

	public function displayArticleAction(){
		$view = new View("displayArticle", "back");
		$article = new Article();

		$data = $article->getContent();
		$view->assign("data", $data);
	}

	public function pagesAction(){
		$view = new View("pages", "back");
		$page = new Page();

		$donnees = $page->getPage();
		$view->assign("donnees", $donnees);

		$page->deletePage();

		if(!empty($_POST)){
			//var_dump($_POST);
			$page->setTitle($_POST["add-page-title"]);
			$page->setSlug($_POST["add-page-slug"]);
			$page->setCreatedAt(date("Y-m-d H:i:s"));
			$page->save();
		}
	}

	public function displayPageAction(){
		$view = new View("displayPage", "back");
		$page = new Page();

		$data = $page->getContentPage();
		$view->assign("data", $data);
	}

	public function apparenceAction(){
		$view = new View("apparence", "front");
		$page = new Page();

		if(!empty($_POST)){ 
			//echo "coucou";
			$page->setId($_GET['idPage']);
			$page->setTitle($_POST["titre_page"]);
			$page->setSlug("/accueil");
			$page->setContent($_POST["affichage-page"]);
			$page->save();
	   }

	   $data = $page->getContentPage();
	   $view->assign("data", $data);
	}

	public function routesPagesArticlesAction(){
		$article = new Article();
		$article->routingPagesArticles();
	}



}