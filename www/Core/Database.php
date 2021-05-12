<?php


namespace App\Core;

$mailexists = 0;
session_start();


class Database
{
	
	private $pdo;
	private $table;

	public function __construct(){
		try{
			$connexion = $this->pdo = new \PDO(DBDRIVER.":dbname=".DBNAME.";charset=utf8;host=".DBHOST.";port=".DBPORT, DBUSER, DBPWD);
			
			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    		$this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

		}catch(Exception $e){
			die ("Erreur SQL ".$e->getMessage());
		}

		//echo get_called_class(); //  App\Models\User ici on peut récupérer le nom de la table
		$classExploded = explode("\\", get_called_class());
		$this->table = DBPREFIX.end($classExploded);
		$this->table=strtolower($this->table);
		//echo "Nom de la table : " .$this->table. "</br>";
	}

	public function save(){

		$data = array_diff_key (
					
					get_object_vars($this), 
					get_class_vars(get_class())
				);
		//var_dump($data);
	
		if(is_null($this->getId())){

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
        	}

        $query = $this->pdo->prepare("UPDATE ".$this->table." SET ".implode(",",$columnsToUpdate)." WHERE id=".$this->getId());
		}
		$query->execute($data);
		$_SESSION['id'] = $this->pdo->lastInsertId();
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
			$id = $_GET['idArticle'];
			$query = $this->pdo->prepare("SELECT content, title, slug FROM tr_article WHERE id =".$id);
			$query->execute();
			$data = $query->fetchall();
			return $data;
		}
	}

	public function confirmation(){

		if(isset($_GET['id']) AND isset($_GET['key']) AND !empty($_GET['id']) AND !empty($_GET['key'])){
			$id= intval($_GET['id']);
			$key= intval($_GET['key']);
			
			$requser = $this->pdo->prepare("SELECT * FROM tr_user WHERE id = ? AND confirmkey = ?");
			$requser->execute(array($id, $key));
			if($requser->rowCount() > 0){
				$userInfo = $requser->fetch();
				if($userInfo['confirmation'] != 1){
					$updateConfirmation = $this->pdo->prepare("UPDATE tr_user SET confirmation = ? WHERE id = ?");
					$updateConfirmation->execute(array(1, $id));
					echo "Votre compte a bien été confirmé";
				}else{
					echo "Votre compte a déjà été confirmé";
				}
			}else{
				echo "Votre identifiant ou votre clé est incorrect";
			}
		}else{
			echo "Aucun utilisateur trouvé";
		}
	}

	public function routingPagesArticles(){
		// echo $_SESSION["uri"];
		$slug = $_SESSION["uri"];
		$queryArticles = $this->pdo->prepare("SELECT content FROM tr_article WHERE slug =\"$slug\"");
		// echo $queryArticles;
		$queryArticles->execute();
		$dataSlug = $queryArticles->fetchall();
		// var_dump($dataSlug);
		$html = "<html>
					<body\">
						".$dataSlug[0]["content"]."
					</body>
				</html>";
		echo $html;
		// echo $dataSlug[0]["content"];
		// return $dataSlug;
	}

	public function verifMailUniq(){
		global $mailexists;
		$email = $_POST["email"];
		$reqmail = $this->pdo->prepare('SELECT id FROM tr_user WHERE email = ?');
        $reqmail->execute(array($email));
         if($reqmail->rowCount() > 0) {
			 $mailexists = 1;
		 }
	}
	public function roleShow(){
		$query = $this->pdo->prepare("SELECT * FROM tr_role");
		$query->execute();
		$donnees = $query->fetchall();
		return $donnees;
	}

	public function requestRole(){
		$query = $this->pdo->prepare("SELECT * FROM tr_role as r INNER JOIN ".$this->table. " as u ON r.id = u.role_idRole");
		$query->execute();
		$donnees = $query->fetchall();
		return $donnees;
	}

	public function userDelete(){
		if(!empty($_GET['deleteId'])){
			$query = $this->pdo->prepare("DELETE FROM ".$this->table." WHERE id = ".$_GET['deleteId']);
			$query->execute();
		}
    }

	public function userMail(){
		$query = $this->pdo->prepare("SELECT email, pseudo, password FROM ".$this->table." WHERE id = (SELECT MAX(id) FROM ".$this->table.")");
		$query->execute();
		$_SESSION['tab'] = $query->fetchall();
		return $_SESSION['tab'];
	}

	public function updateUser(){
		if(!empty($_GET['updateId'])){
			$query = $this->pdo->prepare("UPDATE " .$this->table. " SET lastname = '" .$_POST["lastname"]. "', firstname = '" .$_POST["firstname"]. "', Role_idRole = '" .$_POST["role"]. "' WHERE id = " .$_GET['updateId']);
			$query->execute();
		}
	}
}