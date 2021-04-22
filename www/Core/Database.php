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
		
			//	echo $this->getId();

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

}