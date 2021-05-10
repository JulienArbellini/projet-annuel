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

class Security{


	public function defaultAction(){
		echo "controller security action default";
	}


	public function registerAction(){


		$user = new User();
		$view = new View("register", "back");
		$form = $user->buildFormRegister();
		$view->assign("form", $form);

	    if(!empty($_POST)){
		 	$errors = Form::validator($_POST, $form);

			if(empty($errors)){
				$user->setLastname($_POST["lastname"]);
				$user->setFirstname($_POST["firstname"]);
				$user->setEmail($_POST["email"]);
				$user->setPwd($_POST["pwd"]);
				//$user->setCountry("fr");
				$user->save();

			}else{
				$view->assign("formErrors", $errors);
			}

		}
		
		

	}

	public function addArticleAction(){

		$article = new Article();
		$view = new View("addArticles", "back");
		$form = $article->buildFormAddArticle();
		$view->assign("form", $form);

		 if(!empty($_POST)){
		 	$errors = AddArticleForm::validatorAddArticle($_POST, $form);

			if(empty($errors)){
				
				$article->setTitle($_POST["titre"]);
				$article->setSlug($_POST["slug"]);
				$article->setContent($_POST["contenu"]);
				$article->save();

			}else{
				$view->assign("formErrors", $errors);
			}

		}
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