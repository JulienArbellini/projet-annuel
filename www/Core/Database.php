<?php

namespace App\Core;
use App\Core\Form;

// session_start();
class Database
{

	private $pdo;
	private $table;

	public function __construct(){
		try{
			$this->pdo = new \PDO(DBDRIVER.":dbname=".DBNAME.";host=".DBHOST.";port=".DBPORT, DBUSER, DBPWD);

			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    		$this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

			//echo "connexion réussie";

		

		}catch(Exception $e){
			die ("Erreur SQL ".$e->getMessage());
		}

		//echo get_called_class(); //  App\Models\User ici on peut récupérer le nom de la table
		$classExploded = explode("\\", get_called_class());
		$this->table = DBPREFIX.end($classExploded);
		 //echo "Nom de la table : " .$this->table. "</br>";
	}

	public function save(){



		$data = array_diff_key (
					
					get_object_vars($this), 

					get_class_vars(get_class())

				);
	


		if(is_null($this->getId())){
		
			echo $this->getId();

			//INSERT 

			$columns = array_keys($data); 
			$query = $this->pdo->prepare("INSERT INTO ".$this->table." (
											".implode(",", $columns)."
											) VALUES (
											:".implode(",:", $columns)."
											)");

			

		}else{
			
			//UPDATE 
			$columns = array_keys($data);
			foreach ($columns as $column) {

				$columnsToUpdate[] = $column."=:".$column;
				//var_dump($columnsTopdate);
        	}
			//var_dump($columnsToUpdate);

        $query = $this->pdo->prepare("UPDATE ".$this->table." SET ".implode(",",$columnsToUpdate)." WHERE id=".$this->getId());
		}
		//var_dump($query);
		$query->execute($data);

	}

	public function getArticle(){

		$dataArticle = array_diff_key (
					
			get_object_vars($this), 

			get_class_vars(get_class())

		);

		 $columns_article = array_keys($dataArticle);

		//$query = $this->pdo->prepare("SELECT DISTINCT * FROM ".$this->table);
		$query = $this->pdo->prepare("SELECT a.".implode(",",$columns_article).", u.firstname, a.id
									  FROM ".$this->table." AS a 
									  INNER JOIN tr_user_has_Article AS l ON a.id = l.Article_idArticle
									  INNER JOIN tr_user AS u ON u.id = l.User_idUser");
		$query->execute();
		$donnees = $query->fetchall();
		return $donnees;
	}

	public function deleteArticle(){
		//Requête delete avec un where qui récupère l'id de l'article avec $_GET["idArticle"]
		//$idArticle = $_GET['idArticle'];


		if(!empty($_GET['id'])){
			$Del_Id = $_GET['id'];
			$query1 = $this->pdo->prepare("DELETE FROM tr_user_has_Article WHERE Article_idArticle=".$Del_Id);
			$query2 = $this->pdo->prepare("DELETE FROM ".$this->table." WHERE id=".$Del_Id);
			// var_dump($query1);
			// var_dump($query2);
			//var_dump($_GET['id']);
			$query1->execute();
			$query2->execute();
		}
	}

	public function getContent(){
		if(!empty($_GET['idArticle'])){
			$content = $_GET['idArticle'];
			$query = $this->pdo->prepare("SELECT content, title, slug FROM tr_article WHERE id =".$content);
			$query->execute();
			$data = $query->fetchall();
			return $data;
		}
	}

	public function getPage(){
		$dataPages = array_diff_key (
					
			get_object_vars($this), 

			get_class_vars(get_class())

		);

		$columns_pages = array_keys($dataPages);

		//$query = $this->pdo->prepare("SELECT DISTINCT * FROM ".$this->table);
		$query = $this->pdo->prepare("SELECT p.".implode(",",$columns_pages).", u.firstname, p.id
									  FROM ".$this->table." AS p
									  INNER JOIN tr_page_has_User AS l ON l.Page_idPage = p.id
									  INNER JOIN tr_user AS u ON l.User_idUser = u.id");
		//echo $query;
		$query->execute();
		//var_dump($query);
		$donnees = $query->fetchall();
		// var_dump($donnees);
		return $donnees;
	}

	public function deletePage(){

		if(!empty($_GET['id'])){
			$Del_Id = $_GET['id'];
			$query1 = $this->pdo->prepare("DELETE FROM tr_page_has_User WHERE Page_idPage=".$Del_Id);
			$query2 = $this->pdo->prepare("DELETE FROM ".$this->table." WHERE id=".$Del_Id);
			// var_dump($query1);
			// var_dump($query2);
			//var_dump($_GET['id']);
			$query1->execute();
			$query2->execute();
		}
		
	}

	public function getContentPage(){
		
		if(!empty($_GET['idPage'])){
			$idPage = $_GET['idPage'];
			$query = $this->pdo->prepare("SELECT content, title, slug FROM tr_page WHERE id =".$idPage);
			$query->execute();
			$data = $query->fetchall();
			return $data;
		}
		
	}

	public function definirPageAccueil(){
			$query = $this->pdo->prepare("SELECT slug FROM tr_page WHERE page_accueil=1");
			$query->execute();
			$_SESSION['slug_accueil'] = $query->fetchall();
			return $_SESSION['slug_accueil'];
	}

	public function updatePageAccueil(){
		if(!empty($_GET['idPage']) && !empty($_POST['pageAccueil'])){
			$idPage = $_GET['idPage'];
			$query = $this->pdo->prepare("UPDATE tr_page SET page_accueil = 0 WHERE NOT id=".$idPage);
			$query->execute();
			$data = $query->fetchall();
			return $data;
		}
		else{

			$query1 = $this->pdo->prepare("SELECT MAX(id) FROM ".$this->table);
			$query1->execute();
			$MaxId = $query1->fetchall();

			if(!empty($_POST['pageAccueil'])){
				$query2 = $this->pdo->prepare("UPDATE tr_page SET page_accueil = 0 WHERE NOT id=".$MaxId[0][0]);
				$query2->execute();
				$data = $query2->fetchall();
				return $data;
			}
			
		}
	}

	public function checkboxState(){
		if(!empty($_GET['idPage'])){
			$idPage = $_GET['idPage'];
			$query = $this->pdo->prepare("SELECT page_accueil FROM tr_page WHERE id =".$idPage);
			$query->execute();
			$_SESSION['checkbox_state'] = $query->fetchall();
			return $_SESSION['checkbox_state'];
		}
		else{
			$_SESSION['checkbox_state'] = 0;
		}
	}

	public function routingPagesArticles(){
		$slug = $_SESSION["uri"];

		$queryArticles = $this->pdo->prepare("SELECT content, title FROM tr_article WHERE slug =\"$slug\"");
		$queryArticles->execute();

		$dataSlugArticle = $queryArticles->fetchall();

		if (!empty($dataSlugArticle)){
			$html = "<html>
						<head>
							<meta charset=\"utf-8\">
							<link rel=\"stylesheet\" href=\"framework/dist/site-articles.css\">
							<title>".$dataSlugArticle[0]["title"]."</title>
						</head>
						<body>
							<div id=\"article\"</div>
								".$dataSlugArticle[0]["content"]."
							</div>
						</body>
					</html>";

			echo $html;
		}
		else{
			$queryPages = $this->pdo->prepare("SELECT content, title FROM tr_page WHERE slug =\"$slug\"");
			$queryPages->execute();
			$dataSlugPage = $queryPages->fetchall();

			if(!empty($dataSlugPage)){
				$html = "<html>
							<head>
								<meta charset=\"utf-8\">
								<link rel=\"stylesheet\" href=\"framework/dist/site-pages.css\">
								<title>".$dataSlugPage[0]["title"]."</title>
							</head>
							<body>
								".$dataSlugPage[0]["content"]." titre de la page :".$dataSlugPage[0]["title"]."
							</body>
						</html>"; 

				echo $html;
				
			}
			else{
				die("erreur 404 : Route not found");
				// fopen('test.php', 'r');
			}

		}

		
	}

	


}