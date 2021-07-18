<?php

namespace App;

use App\Core\Security;
use App\Core\View;
use App\Core\Database;
use App\Models\Article;
use App\Core\Form;
use App\Models\User;
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
		session_start();	
	
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
			$article->setId($_GET['idArticle']);
			$article->setTitle($_POST["titre_article"]);
			$article->setSlug($_POST["slug_article"]);
			$article->setContent($_POST["contenu_article"]);
			$article->setCreatedAt(date("Y-m-d H:i:s"));
			$article->save();
	   }
	}
	public function registerAction(){
		$view = new View("register", "back");
	}

	public function usersAction(){
		$view = new View("users", "back");
		$userSelect = new User();
		$mailer = new Mailer();

		$donnees = $userSelect->requestRole();
		$view->assign("donnees", $donnees);
		
		$userSelect->userDelete();

		$data = $userSelect->roleShow();
		$view->assign("data", $data);

		$form = $userSelect->buildFormAddUser();
		$view->assign("form", $form);
		

		if(empty($_GET["updateId"])){

			if(!empty($_POST)){
				$errors = Form::validatorAddUserForm($_POST, $form);

				if(empty($errors)){
					$userSelect->setFirstname($_POST["firstname"]);
					$userSelect->setLastname($_POST["lastname"]);
					$userSelect->setEmail($_POST["email"]);
					$userSelect->setPseudo($_POST["pseudo"]);
					$userSelect->setPwd($_POST["password"]);
					//password_hash($_POST["password"], PASSWORD_BCRYPT)
					$userSelect->setRole($_POST["role"]);
					$userSelect->save();
					$test = $userSelect->userMail();
					$mailer->sendMailUser();
				}else{
					$view->assign("formErrors", $errors);
				}
			}
		}
		
		else{
			if(!empty($_POST)){
				$userSelect->setId($_GET["updateId"]);
				$userSelect->setLastname($_POST["lastname"]);
				$userSelect->setFirstname($_POST["firstname"]);
				$userSelect->setRole($_POST["role"]);
				$userSelect->updateUser();
			}
		}
	}

	public function displayArticleAction(){
		$view = new View("displayArticle", "back");
		$article = new Article();

		$data = $article->getContent();
		$view->assign("data", $data);
	}

	public function routesPagesArticlesAction(){
		// $view = new View("test", "back");
		$article = new Article();

		$dataSlug = $article->routingPagesArticles();
		// $view->assign("dataSlug", $dataSlug);
	}

	public function profileAction(){
		$user = new User();
		$view = new View("profile", "backProfile");
		$form = $user->buildFormProfile();
		$form = $view->assign("form", $form);
		
		session_start();
		
		$data = $user->recupDataProfile();
		$view->assign("data",$data);
		$user = $user->getUserByMail($data[0]['email']);
		
		//var_dump($user);
		
	// 	$errors = Form::validatorProfile($_POST, $form);
		// if (!empty($_POST)) {
	// 		if(empty($errors)){
				
	//			$user->setFirstname(htmlspecialchars($_POST["firstname"]));
	// 			$user->setLastname(htmlspecialchars($_POST["lastname"]));
	// 			$user->setPseudo(htmlspecialchars($_POST["username"]));
	// 			$user->setPwd(password_hash(htmlspecialchars($_POST["password"]), PASSWORD_BCRYPT));
	// 			$user->setDescritpion(htmlspecialchars($_POST['descritpion']));

	//			$user->save();
				//echo 'Votre profil a bien été mis à jour';
	// 		} else{
	// 			$view->assign("formErrors", $errors);
	// 		}
		// } else {
		// 	echo 'Veuillez remplir les données de formulaire';
		// }
	}
}