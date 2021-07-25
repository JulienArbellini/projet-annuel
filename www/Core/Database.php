<?php


namespace App\Core;
use App\Core\Form;

use App\Models\User;

$mailexists = 0;

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
		// var_dump($data);
	
		if(is_null($this->getId())){

			//INSERT 

			$columns = array_keys($data); 
			$query = $this->pdo->prepare("INSERT INTO ".$this->table." (
											".implode(",", $columns)."
											) VALUES (
											:".implode(",:", $columns)."
											)");

			$query->execute($data);
			
			if($_SERVER['REQUEST_URI'] == "/s-inscrire") {
				$_SESSION['id'] = $this->pdo->lastInsertId();
			}
						
		}else{	
			//UPDATE 
			$columns = array_keys($data);
			foreach ($columns as $column) {

				$columnsToUpdate[] = $column."=:".$column;
        	}

        $query = $this->pdo->prepare("UPDATE ".$this->table." SET ".implode(",",$columnsToUpdate)." WHERE id=".$this->getId());
		$query->execute($data);
		}
		// $query->execute($data);
		
	}

	public function getArticle(){

		$query = $this->pdo->prepare("SELECT * FROM tr_user AS u
									  INNER JOIN tr_article AS a ON a.id_user = u.id");
		$query->execute();
		$donnees = $query->fetchall();

		// var_dump($donnees);
		return $donnees;
		
		// $_SESSION['id'] = $this->pdo->lastInsertId();

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

	public function connectedOff(){
        $this->pdo->query("UPDATE tr_user SET connected= 0 WHERE id=".$_GET['id']);
    }

	public function connectedUserId(){
        $query=$this->pdo->prepare("SELECT id FROM tr_user WHERE connected=1");
        $query->execute();
        $_SESSION['idUserConnected']= $query->fetchall();
        // var_dump($_SESSION['id']);
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

	public function getFirstnameByEmail($email){
        $prenom = $this->pdo->prepare("SELECT firstname FROM tr_user WHERE email = "."'".$email."'");
        $prenom->execute();
        $result = $prenom->fetch(\PDO::FETCH_ASSOC);
        return $result['firstname'];
    }

	public function deleteArticle(){



		if(!empty($_GET['id'])){
			$Del_Id = $_GET['id'];
			$query = $this->pdo->prepare("DELETE FROM ".$this->table." WHERE id= :del_id");
			$query->bindValue(':del_id', $Del_Id);
			$query->execute();
		}
	}

	public function getContent(){
		if(!empty($_GET['idArticle'])){
			$id = $_GET['idArticle'];
			$query = $this->pdo->prepare("SELECT content, title, slug FROM tr_article WHERE id = :id");
			$query->bindValue(':id', $id);
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
			return false;
			echo "Aucun utilisateur trouvé";
			
		}
	}

	public function verifConfirmed() {
		$user = $this->getUserByMail($_POST['email']);
		//var_dump($user);
		$id = $user->getId();
		$query = $this->pdo->prepare("SELECT confirmation FROM tr_user WHERE id = $id");
		$query->execute();
		$data = $query->fetch();
		if ($data['confirmation'] == 1) {
			return true;
		}
		else {
			return false;
		}
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
		$query = $this->pdo->prepare("SELECT * FROM tr_role as r INNER JOIN ".$this->table. " as u ON r.id = u.role_idRole WHERE NOT connected = :connected");
		$query->bindValue(':connected', 1);
		$query->execute();
		$donnees = $query->fetchall();
		return $donnees;
	}

	public function userDelete(){
		if(!empty($_GET['deleteId'])){
			$query = $this->pdo->prepare("DELETE FROM ".$this->table." WHERE id = :delete_id");
			$query->bindValue(':delete_id', $_GET['deleteId']);
			$query->execute();
		}
    }

	public function userMail(){
		$query = $this->pdo->prepare("SELECT email, pseudo, code_confirmation_mdp FROM ".$this->table." WHERE id = (SELECT MAX(id) FROM ".$this->table.")");
		$query->execute();
		$_SESSION['tab'] = $query->fetchall();
		return $_SESSION['tab'];
	}

	public function updateUser(){
		if(!empty($_GET['updateId'])){
			$query = $this->pdo->prepare("UPDATE " .$this->table. " SET lastname = :lastname, firstname = :firstname, pseudo= :pseudo, Role_idRole = :Role_idRole WHERE id = :id");
			$query->bindValue(':lastname', $_POST["lastname"]);
			$query->bindValue(':firstname', $_POST["firstname"]);
			$query->bindValue(':pseudo', $_POST["pseudo"]);
			$query->bindValue(':Role_idRole', $_POST["role"]);
			$query->bindValue(':id', $_GET['updateId']);
			$query->execute();
		}
	}

	public function getNumberofPage(){
		$query = $this->pdo->prepare("SELECT COUNT(*) AS nb FROM tr_page");
		$query->execute();
		$donnees = $query->fetch(\PDO::FETCH_OBJ);
		return $donnees;
	}

	public function getNumberofArticle(){
		$query = $this->pdo->prepare("SELECT COUNT(*) AS nb FROM tr_article");
		$query->execute();
		$donnees = $query->fetch(\PDO::FETCH_OBJ);
		return $donnees;
	}

	public function getNumberofUser(){
		$query = $this->pdo->prepare("SELECT COUNT(*) AS nb FROM tr_user");
		$query->execute();
		$donnees = $query->fetch(\PDO::FETCH_OBJ);
		return $donnees;
	}

	public function getLastPage(){
		$query = $this->pdo->prepare("SELECT * FROM tr_user AS u INNER JOIN tr_page AS p ON p.id_user = u.id ORDER BY p.id DESC LIMIT 1");
		$query->execute();
		$donnees = $query->fetch(\PDO::FETCH_ASSOC);
		return $donnees;
	}

	public function checkPhoto($id){
		// var_dump($id);
		$query = $this->pdo->prepare("SELECT avatar FROM tr_user WHERE id = $id");
		$query->execute();
		$donnees = $query->fetch(\PDO::FETCH_ASSOC);
		return $donnees;
	}
	
	public function getLastArticle(){
		$query = $this->pdo->prepare("SELECT * FROM tr_user AS u INNER JOIN tr_article AS a ON a.id_user = u.id ORDER BY a.id DESC LIMIT 1");
		$query->execute();
		$donnees = $query->fetch(\PDO::FETCH_ASSOC);
		return $donnees;
	}

	public function getLastUser(){
		$query = $this->pdo->prepare("SELECT *  FROM tr_user ORDER BY id DESC LIMIT 1");
		$query->execute();
		$donnees = $query->fetch(\PDO::FETCH_ASSOC);
		return $donnees;
	}

	// public function getPage(){
	// 	$dataPages = array_diff_key (
					
	// 		get_object_vars($this), 

	// 		get_class_vars(get_class())
	// 	);
	// }

	public function userAdminConnect() {
		$query = $this->pdo->prepare("SELECT email, pseudo, firstname, lastname FROM ".$this->table." WHERE connected = :connected AND Role_idRole = :role");
		$query->bindValue(':connected', 1);
		$query->bindValue(':role', 1);
		$query->execute();
		$_SESSION['gestionRole'] = $query->fetchall();
		return $_SESSION['gestionRole'];
	}

	public function userSpectateur() {
		$query = $this->pdo->prepare("SELECT * FROM " .$this->table." WHERE connected = :connected AND NOT Role_idRole = :role");
		$query->bindValue(':connected', 1);
		$query->bindValue(':role', 3);
		$query->execute();
		$_SESSION['notSpectateur'] = $query->fetchall();
		return $_SESSION['notSpectateur'];
	}

	public function getPage(){
		$query = $this->pdo->prepare("SELECT * FROM tr_user AS u
									  INNER JOIN tr_page AS p ON p.id_user = u.id");
		$query->execute();
		$donnees = $query->fetchall();
		return $donnees;
	}

	public function deletePage(){

		if(!empty($_GET['id'])){
			$Del_Id = $_GET['id'];
			$query = $this->pdo->prepare("DELETE FROM ".$this->table." WHERE id= :del_id");
			$query->bindValue(':del_id', $Del_Id);
			$query->execute();
		}
		
	}

	public function getContentPage(){
		
		if(!empty($_GET['idPage'])){
			$idPage = $_GET['idPage'];
			$query = $this->pdo->prepare("SELECT content, title, slug FROM tr_page WHERE id = :id_page");
			$query->bindValue(':id_page', $idPage);
			$query->execute();
			$data = $query->fetchall();
			return $data;
		}
		
	}

	public function definirPageAccueil(){
			$query = $this->pdo->prepare("SELECT slug FROM tr_page WHERE page_accueil=:page_accueil");
			$query->bindValue(':page_accueil', 1);
			$query->execute();
			$_SESSION['slug_accueil'] = $query->fetchall();
			return $_SESSION['slug_accueil'];
	}

	public function updatePageAccueil(){
		if(!empty($_GET['idPage']) && !empty($_POST['pageAccueil'])){
			$idPage = $_GET['idPage'];
			$query = $this->pdo->prepare("UPDATE tr_page SET page_accueil = 0 WHERE NOT id=:id_page");
			$query->bindValue(':id_page', $idPage);
			$query->execute();
			$data = $query->fetchall();
			return $data;
		}
		else{

			$query1 = $this->pdo->prepare("SELECT MAX(id) FROM ".$this->table);
			$query1->execute();
			$MaxId = $query1->fetchall();

			if(!empty($_POST['pageAccueil'])){
				$query2 = $this->pdo->prepare("UPDATE tr_page SET page_accueil = 0 WHERE NOT id=:max_id");
				$query2->bindValue(':max_id', $MaxId[0][0]);
				$query2->execute();
				$data = $query2->fetchall();
				return $data;
			}
			
		}
	}

	public function checkboxState(){
		if(!empty($_GET['idPage'])){
			$idPage = $_GET['idPage'];
			$query = $this->pdo->prepare("SELECT page_accueil FROM tr_page WHERE id = :id_page");
			$query->bindValue(':id_page', $idPage);
			$query->execute();
			$_SESSION['checkbox_state'] = $query->fetchall();
			return $_SESSION['checkbox_state'];
		}
		else{
			$_SESSION['checkbox_state'] = 0;
		}
	}

	public function getIdUserConnected(){
		$query = $this->pdo->prepare("SELECT id FROM tr_user WHERE connected = 1");
		$query->execute();
		$_SESSION['connectedUser'] = $query->fetchall();
		// var_dump($_SESSION['connectedUser']);
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
								".$dataSlugPage[0]["content"]."
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

	



	public function recupDataProfile() {
		$id = $_SESSION['id'];
		$query = $this->pdo->prepare("SELECT firstname, lastname, pseudo, email FROM tr_user WHERE id = $id");
		$query->execute();
		$data = $query->fetchall();
		return $data;
	}

	public function getUserByMail($email):User{
		$query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE email = ?");
		$query->execute(array($email));
		$result = $query->fetchAll(\PDO::FETCH_ASSOC);
		$data = $result[0];
		$user = new User();
		foreach ($data as $key => $value) {
			$id = $user->setId($data['id']);
			$user->setLastname($data['lastname']);
			$user->setFirstname($data['firstname']);
			$user->setEmail($data['email']);
			$user->setPwd($data['password']);
			$user->setPseudo($data['pseudo']);
			$user->setCreatedAtUser($data['createdAtUser']);
			$user->setRole($data['Role_idRole']);
			$user->setConfirmation($data['confirmation']);
			$user->setConfirmKey($data['confirmkey']);
			$user->setAvatar($data['avatar']);
		}
		return $user;
	}

	public function uploadAvatar($avatar, $id) {
		// $DB->insert("UPDATE utilisateur SET avatar = ? WHERE  id = ?", 
		// 	array(($nom.".".$extensionUpload), $_SESSION['id']));
		$query = $this->pdo->prepare("UPDATE tr_user SET avatar = ? WHERE id = ?");
		$query->execute(array($avatar, $id));
	}

	
}