<?php

namespace App;

use App\Core\Security;
use App\Core\View;
use App\Core\Database;
use App\Models\Article;
use App\Core\AddArticleForm;
use App\Core\Form;
use App\Models\User;
use App\Core\Mailer;
use App\Models\Page;
use App\Models\Category;
use App\Models\category_has_Article;


class Base{

	//Must be connected
	public function dashboardAction(){
		
		$security = new Security(); 
		if(!$security->isConnected()){
			die("Error not authorized");
		}

		$view = new View("dashboard", "back");

		$page = new Page();
		$userSpec = new User();
		$article = new Article();
		$user = new User();

		$numberOfPage = $page->getNumberofPage();
		$numberOfArticle = $page->getNumberofArticle();
		$numberOfUser = $user->getNumberofUser();
		$lastPage = $page->getLastPage();
		$lastArticle = $page->getLastArticle();
		$lastUser = $user->getLastUser();
		$connectedUser = $user->getIdUserConnected();
		$profilPhotoCheck = $user->checkPhoto($_SESSION['id']);
		$view->assign("donnees", [$numberOfPage, $numberOfArticle, $lastPage, $lastArticle, $lastUser, $numberOfUser, $profilPhotoCheck]);

		$page->definirPageAccueil();
		$notSpectateur = $userSpec->userSpectateur();		
	
	}

	public function articlesAction(){
		$view = new View("articles", "back");
		$article = new Article();
		$userSpec = new User();
		$article->connectedUserId();
		
		$article->deleteArticle();

		$donnees = $article->getArticle();
		$view->assign("donnees", $donnees);

		$notSpectateur = $userSpec->userSpectateur();
		$view->assign("notSpectateur", $notSpectateur);
	}

	public function editArticleAction(){
		$view = new View("edit-article", "back");
		$article = new Article();
		$categorie = new Category();
		$updateCat = new category_has_Article();

		$list_category = $categorie->getcategoriesArticles();

		$article->getIdUserConnected();
		$data = $article->getContent();
		$view->assign("data", $data);
		$view->assign("list_category", $list_category);

	   if(!empty($_POST["categories"])){
			$updateCat->setCategory_idCategory($_POST["categories"]);
			$updateCat->saveCategorie();
	   }

	   if(!empty($_POST) && empty($_POST["categories"])){ 
		$article->setId($_GET['idArticle']);
		$article->setTitle(htmlspecialchars($_POST["titre_article"]));
		$article->setSlug(htmlspecialchars($_POST["slug_article"]));
		$article->setContent($_POST["contenu_article"]);
		$article->setIdUser($_POST["idConnectedUser"]);
		$article->setCreatedAt(date("Y-m-d H:i:s"));
		$article->save();
   		}

	}

	public function usersAction(){
		$view = new View("users", "back");
		$userSelect = new User();
		$mailer = new Mailer();

		$userSelect->userDelete();

		$form = $userSelect->buildFormAddUser();

		if(empty($_GET["updateId"])){

			if(!empty($_POST)){
				$errors = Form::validatorAddUserForm($_POST, $form);

				if(empty($errors)){
					$userSelect->setFirstname(htmlspecialchars($_POST["firstname"]));
					$userSelect->setLastname(htmlspecialchars($_POST["lastname"]));
					$userSelect->setEmail(htmlspecialchars($_POST["email"]));
					$userSelect->setPseudo(htmlspecialchars($_POST["pseudo"]));
					$userSelect->setRole(htmlspecialchars($_POST["role"]));
					$userSelect->setConfirmation(1);
					$userSelect->setCreatedAtUser(date("Y-m-d H:i:s"));
					$password = uniqid();
					$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
					$userSelect->setCodeConfirmationMdp($password);
					$userSelect->save();
					$test = $userSelect->userMail();
					$expediteurMail = $userSelect->userAdminConnect();
					$mailer->sendMailUser();
				}else{
					$view->assign("formErrors", $errors);
				}
			}
		}
		
		else{
			if(!empty($_POST)){
				$userSelect->setId($_GET["updateId"]);
				$userSelect->setLastname(htmlspecialchars($_POST["lastname"]));
				$userSelect->setFirstname(htmlspecialchars($_POST["firstname"]));
				$userSelect->setPseudo(htmlspecialchars($_POST["pseudo"]));
				$userSelect->setRole(htmlspecialchars($_POST["role"]));
				$userSelect->setCreatedAtUser(date("Y-m-d H:i:s"));
				$userSelect->updateUser();
			}
		}

		$view->assign("form", $form);

		$donnees = $userSelect->requestRole();
		$view->assign("donnees", $donnees);

		$gestionRole = $userSelect->userAdminConnect();
		$view->assign("gestionRole", $gestionRole);

		$data = $userSelect->roleShow();
		$view->assign("data", $data);

	}

	public function addArticleAction(){

		$article = new Article();
		$view = new View("addArticles", "back");
		$article->getIdUserConnected();
		$form = $article->buildFormAddArticle();
		$view->assign("form", $form);


		 if(!empty($_POST)){
		 	$errors = AddArticleForm::validatorAddArticle($_POST, $form);

			if(empty($errors)){
				
				$article->setTitle(htmlspecialchars($_POST["titre"]));
				$article->setSlug(htmlspecialchars($_POST["slug"]));
				$article->setContent($_POST["contenu"]);
				$article->setCreatedAt(date("Y-m-d H:i:s"));
				$article->setIdUser(htmlspecialchars($_POST["auteur"]));
				$article->save();

			}else{
				$view->assign("formErrors", $errors);
			}

		}
	}

	public function pagesAction(){
		$view = new View("pages", "back");
		$page = new Page();
		$userSpec = new User();
		$page->connectedUserId();
		

		$page->deletePage();

		if(!empty($_POST)){
			$page->setTitle(htmlspecialchars($_POST["add-page-title"]));
			$page->setSlug(htmlspecialchars($_POST["add-page-slug"]));
			$page->setCreatedAt(date("Y-m-d H:i:s"));
			$page->setIdUser(htmlspecialchars($_POST["id_user_page"]));
			$page->save();
		}

		$donnees = $page->getPage();
		$view->assign("donnees", $donnees);

		$notSpectateur = $userSpec->userSpectateur();
		$view->assign("notSpectateur", $notSpectateur);

	}


	public function apparenceAction(){
		$view = new View("apparence", "front");
		$page = new Page();
		$page->connectedUserId();

		if(!empty($_POST) && !empty($_GET['idPage'])){ 
			$page->setId($_GET['idPage']);
			$page->setTitle(htmlspecialchars($_POST["titre_page"]));
			$page->setSlug(htmlspecialchars($_POST["slugPage"]));
			$page->setContent($_POST["affichage-page"]);
			$page->setIdUser(htmlspecialchars($_POST["id_user_page"]));

			if(!empty($_POST['pageAccueil'])){
				$page->setPageAccueil("1");
			}
			else{
				$page->setPageAccueil("0");
			}
			$page->save();

			$page->updatePageAccueil();

	   }

	   if(!empty($_POST) && empty($_GET['idPage'])){

			$page->setTitle(htmlspecialchars($_POST["titre_page"]));
			$page->setSlug(htmlspecialchars($_POST["slugPage"]));
			$page->setContent($_POST["affichage-page"]);
			$page->setIdUser(htmlspecialchars($_POST["id_user_page"]));

			if(!empty($_POST['pageAccueil'])){
				$page->setPageAccueil("1");
			}
			else{
				$page->setPageAccueil("0");
			}
			$page->save();

			$page->updatePageAccueil();
	   }

	   $page->checkboxState();

	   $page->definirPageAccueil();

	   $data = $page->getContentPage();
	   $view->assign("data", $data);


	}

	public function routesPagesArticlesAction(){
		$article = new Article();
		$article->routingPagesArticles();
	}

	public function profileAction(){
		$user = new User();
		$view = new View("profile", "back");
		$form = $user->buildFormProfile();
		$view->assign("form", $form);
				
		$data = $user->recupDataProfile();
		$view->assign("data",$data);
		$user = $user->getUserByMail($_SESSION['email']);
		$data = $user->recupDataProfile();
		if (isset($_POST['submit_profile'])){
			$errors = Form::validatorProfile($_POST, $form);
			if (!empty($_POST)) {
				if(empty($errors)){

					$user->setFirstname(htmlspecialchars($_POST["firstname"]));
					$user->setLastname(htmlspecialchars($_POST["lastname"]));
					$user->setPseudo(htmlspecialchars($_POST["pseudo"]));
					$user->setPwd(password_hash(htmlspecialchars($_POST["pwd"]), PASSWORD_BCRYPT));

					$user->save();
					$_SESSION['pseudo'] = $_POST['pseudo'];
					$data = $user->recupDataProfile();
					$view->assign("data",$data);
					echo "<script>alert('Votre profil a bien été mis à jour')</script>";
				} else{
					$view->assign("formErrors", $errors);
				}
			}	
		} else {
			if(isset($_FILES['file'])){
				$tmpName = $_FILES['file']['tmp_name'];
				$name = $_FILES['file']['name'];
				$size = $_FILES['file']['size'];
				$error = $_FILES['file']['error'];

				$tabExtension = explode('.', $name);
				$extension = strtolower(end($tabExtension));
			
				$extensions = ['jpg', 'png', 'jpeg', 'gif'];

				$maxSize= 3221225472;
			
				if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
					
					$dossier = "public/img/" . $_SESSION['id'] . "/";  
 
					if (!is_dir($dossier)){ 
						mkdir($dossier);
					}else{
						if(file_exists("public/img/". $_SESSION['id'] . "/" . $_SESSION['avatar']) && isset($_SESSION['avatar'])){
							unlink("public/img/". $_SESSION['id'] . "/" . $_SESSION['avatar']);
						}
					}
					
					$uniqueName = uniqid('', true);

					$file = $uniqueName.".".$extension;

					$url = 'public/img/'.$_SESSION['id']."/".$file;

					move_uploaded_file($tmpName, $url);
			
					$user->setAvatar($url);
					$user->uploadAvatar($url, $_SESSION['id']);
					
					$_SESSION['avatar'] = $url;
					echo "<script>alert('Votre avatar a bien été mis à jour')</script>";
				}
				else{
					echo "Une erreur est survenue";
				}
			}

		}	
			
	}

	public function FAQAction(){
		$view = new View("FAQ", "back");
	}

	public function categoriesAction(){
		$view = new View("Categories", "back");
		$categorie = new Category();
		$userSpec = new User();

		$categorie->deleteCategorie();

		if(!empty($_POST)){
			$categorie->setCategoryName(htmlspecialchars($_POST["add-category"]));
			$categorie->save();
		}

		$categorie_data = $categorie->getcategoriesArticles();
		$view->assign("categorie_data", $categorie_data);

		$notSpectateur = $userSpec->userSpectateur();
		$view->assign("notSpectateur", $notSpectateur);
	}

	public function editCategorieAction(){
		$view = new View("infoCategorie", "back");
		$categorie = new Category();

		$list_articles = $categorie->listArticleCategorie();
		$view->assign("list_articles", $list_articles);

		$titleCategorie = $categorie->getTitleCategorie();
		$view->assign("titleCategorie", $titleCategorie);

		if(!empty($_POST)){
			$categorie->setId($_GET["idCategorie"]);
			$categorie->setCategoryName(htmlspecialchars($_POST["titre-categorie"]));
			$categorie->save();
		}
	}

}