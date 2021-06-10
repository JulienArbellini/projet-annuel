<?php

namespace App\Core;


class Database
{

	private $pdo;
	private $table;
	

	public function __construct(){
		try{
			$options = array(
				\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
			  );
			$this->pdo = new \PDO(DBDRIVER.":dbname=".DBNAME.";host=".DBHOST.";port=".DBPORT, DBUSER, DBPWD, $options);

			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    		$this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

		}catch(Exception $e){
			die ("Erreur SQL ".$e->getMessage());
		}
		$classExploded = explode("\\", get_called_class());
		$this->table = DBPREFIX.end($classExploded);
		$this->table=strtolower($this->table);

	}


	


	public function save(){



		$data = array_diff_key (
					
					get_object_vars($this), 

					get_class_vars(get_class())

				);
	


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
			foreach ($columns as $column) {

				$columnsTopdate[] = $column."=:".$column;
        	}

        $query = $this->pdo->prepare("UPDATE ".$this->table." SET ".implode(",",$columnsToUpdate)." WHERE id=".$this->getId());
		}

		$query->execute($data);
		$_SESSION['id'] = $this->pdo->lastInsertId();

	}

	public function createConfirmationKey($password, $email){
		$this->pdo->query("UPDATE tr_user SET code_confirmation_mdp="."'".$password."'". "WHERE email="."'".$email."'");
		$this->pdo->query("UPDATE tr_user SET confirmationKeyTmtp="."'".date("Y-m-d H:i:s")."'". "WHERE email="."'".$email."'");
	}


	public function checkConfirmationKey($confirmationKey){
		$stmt = $this->pdo->prepare("SELECT code_confirmation_mdp FROM tr_user WHERE code_confirmation_mdp = ?");
		$stmt->execute([$confirmationKey]);
		$test = $stmt->fetch();
		if ($test){
			return true;
		}else{
			return false;
		}
	}

	public function connectedOn($email){
		$this->pdo->query("UPDATE tr_user SET connected= 1 WHERE email="."'".$email."'");
	}

	public function connectedOff($email){
		$this->pdo->query("UPDATE tr_user SET connected= 0 WHERE email="."'".$email."'");
	}

		


	public function checkConfirmationKeyTmtp($confirmationKey){ 
		$check = $this->pdo->prepare("SELECT confirmationKeyTmtp FROM tr_user WHERE code_confirmation_mdp = ?");
		$check->execute([$confirmationKey]);
		$start = $check->fetch(\PDO::FETCH_ASSOC);
		$start = $start['confirmationKeyTmtp'];
		$start = date_create($start);
		$end = date("Y-m-d H:i:s");
		$end = date_create($end);
		$interval = date_diff($start,$end);
		if($interval->format('%h') <= 3){
			echo 'YEAAAAAAh';
			return true;
		}else{
			echo '<html><br></html>Votre code de confirmation est périmé, veuillez le renouveller en rentrant votre mail ici';
			$this->deleteConfirmationKey($confirmationKey, $this->getUserId($confirmationKey));
			return false;
		}
		
	}

	public function getUserId($confirmationKey){
		$id = $this->pdo->prepare("SELECT id FROM tr_user WHERE code_confirmation_mdp = "."'".$confirmationKey."'");
		$id->execute();
		$result = $id->fetch(\PDO::FETCH_ASSOC);
		return $result['id'];
	}

	public function updatePwd($id, $pwd){
		$this->pdo->query("UPDATE tr_user SET password="."'".password_hash($pwd, PASSWORD_DEFAULT)."'". "WHERE id="."'".$id."'");
	}

	public function verifMail(){
		global $mailexists;
		if(isset($_POST['recup_mail'])){
			$email = $_POST['recup_mail'];
			$reqmail = $this->pdo->prepare('SELECT id FROM tr_user WHERE email = ?');
			$reqmail->execute(array($email));			
			if($reqmail->rowCount() > 0) {
				$mailexists = 1;
			}else{
				$mailexists = 0;
			}
		}
	}

	public function checkPwd($pwd_request, $email){
		$password = $this->pdo->prepare("SELECT password FROM tr_user WHERE email = ?");
		$password->execute([$email]);
		$real_password = $password->fetch(\PDO::FETCH_ASSOC);
		$real_password = $real_password['password'];
		if(password_verify($pwd_request, $real_password)){
			return true;
		}
		else{
			return false;
		}

	}

	public function deleteConfirmationKey($confirmationKey, $id){
		$this->pdo->query("UPDATE tr_user SET code_confirmation_mdp = NULL WHERE id = " . "'".$id."'"." AND code_confirmation_mdp = " . "'".$confirmationKey."'"."");
	}

	public function getPseudo($email){
		$pseudo = $this->pdo->prepare("SELECT pseudo FROM tr_user WHERE email = "."'".$email."'");
		$pseudo->execute();
		$result = $pseudo->fetch(\PDO::FETCH_ASSOC);
		return $result['pseudo'];
	}

}