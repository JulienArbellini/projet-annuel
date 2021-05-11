<?php

namespace App\Core;

session_start();


class Database
{

	private $pdo;
	private $table;

	public function __construct(){
		try{
			$this->pdo = new \PDO(DBDRIVER.":dbname=".DBNAME.";host=".DBHOST.";port=".DBPORT, DBUSER, DBPWD);

			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    		$this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

		}catch(Exception $e){
			die ("Erreur SQL ".$e->getMessage());
		}

		//echo get_called_class(); //  App\Models\User ici on peut récupérer le nom de la table
		$classExploded = explode("\\", get_called_class());
		$this->table = DBPREFIX.end($classExploded);
		// echo "Nom de la table : " .$this->table. "</br>";
	}

	public function save(){



		$data = array_diff_key (
					
					get_object_vars($this), 

					get_class_vars(get_class())

				);
	


		if(is_null($this->getId())){
		
			//echo $this->getId();

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

				$columnsToUpdate[] = $column."=:".$column;
        	}

        $query = $this->pdo->prepare("UPDATE ".$this->table." SET ".implode(",",$columnsToUpdate)." WHERE id=".$this->getId());
		}

		
		$query->execute($data);
		// var_dump($query);

	}

	// public function userShow(){
	// 	$query = $this->pdo->prepare("SELECT * FROM ".$this->table);
	// 	$query->execute();
	// 	$donnees = $query->fetchall();
	// 	return $donnees;
	// }

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
		// var_dump($test);
	}

	public function updateUser(){
		if(!empty($_GET['updateId'])){
			// echo $_GET['updateId'];
		// UPDATE table SET nom_colonne_1 = 'nouvelle valeur' WHERE condition
			$query = $this->pdo->prepare("UPDATE " .$this->table. " SET lastname = '" .$_POST["lastname"]. "', firstname = '" .$_POST["firstname"]. "', Role_idRole = '" .$_POST["role"]. "' WHERE id = " .$_GET['updateId']);
			// var_dump($query);
			$query->execute();
			// echo $_POST["lastname"];
		}
	}
}