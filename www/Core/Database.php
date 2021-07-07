<?php


namespace App\Core;

$mailexists = 0;
// session_start();


class Database
{
	
	private $pdo;
	private $table;
	

	public function __construct(){
		try{
			$connexion = $this->pdo = new \PDO(DBDRIVER.":dbname=".DBNAME.";charset=utf8;host=".DBHOST.";port=".DBPORT, DBUSER, DBPWD);
			
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
		// echo $query;
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
		// global $mailexists;
		if(isset($_POST['email'])){
			$email = $_POST['email'];
			$reqmail = $this->pdo->prepare('SELECT id FROM tr_user WHERE email = ?');
			$reqmail->execute(array($email));			
			if($reqmail->rowCount() > 0) {
				return 1;
			}else{
				return 0;
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
			$query = $this->pdo->prepare("UPDATE " .$this->table. " SET lastname = '" .$_POST["lastname"]. "', firstname = '" .$_POST["firstname"]. "', pseudo = '" .$_POST["pseudo"]. "', Role_idRole = '" .$_POST["role"]. "' WHERE id = " .$_GET['updateId']);
			$query->execute();
		}
	}
}