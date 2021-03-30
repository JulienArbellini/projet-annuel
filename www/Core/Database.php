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
			foreach ($columns as $column) {

				$columnsTopdate[] = $column."=:".$column;
        	}

        $query = $this->pdo->prepare("UPDATE ".$this->table." SET ".implode(",",$columnsToUpdate)." WHERE id=".$this->getId());
		}

		$query->execute($data);

	}

	public function getArticle(){

		$dataArticle = array_diff_key (
					
			get_object_vars($this), 

			get_class_vars(get_class())

		);

		 $columns_article = array_keys($dataArticle);

		//$query = $this->pdo->prepare("SELECT DISTINCT * FROM ".$this->table);
		$query = $this->pdo->prepare("SELECT a.".implode(",",$columns_article).", u.firstname, a.idArticle
									  FROM ".$this->table." AS a 
									  INNER JOIN tr_user_has_Article AS l ON a.idArticle = l.Article_idArticle
									  INNER JOIN tr_user AS u ON u.idUser = l.User_idUser");
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
			$query2 = $this->pdo->prepare("DELETE FROM ".$this->table." WHERE idArticle=".$Del_Id);
			//var_dump($query1);
			//var_dump($query2);
			//var_dump($_GET['id']);
			$query1->execute();
			$query2->execute();
		}
	}

}