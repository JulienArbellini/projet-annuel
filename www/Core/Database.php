<?php

namespace App\Core;


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
			$content = $_GET['idPage'];
			$query = $this->pdo->prepare("SELECT content, title FROM tr_page WHERE id =".$content);
			$query->execute();
			$data = $query->fetchall();
			return $data;
		}
		
	}

	public function routingPagesArticles(){
		$slug = $_SESSION["uri"];

		$queryArticles = $this->pdo->prepare("SELECT content FROM tr_article WHERE slug =\"$slug\"");
		$queryArticles->execute();

		$dataSlugArticle = $queryArticles->fetchall();

		if (!empty($dataSlugArticle)){
			$html = "<html>
						<body>
							".$dataSlugArticle[0]["content"]."
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
							<body>
								".$dataSlugPage[0]["content"]." titre de la page :".$dataSlugPage[0]["title"]."
							</body>
						</html>";

				echo $html;
			}
			else{
				die("erreur 404 : Route not found");
			}

		}

		
	}


}