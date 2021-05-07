<?php
namespace App\Models;

use App\Core\Database;

date_default_timezone_set('Europe/Paris');

class User extends Database
{
	private $idUser = null;
	protected $lastname;
	protected $firstname;
	protected $email;
	protected $password;
	protected $pseudo;
	protected $createdAtUser;
	protected $Role_idRole = 1;
	protected $confirmKey;
	//protected $country;
	//protected $status = 0;
	//protected $isDeleted = 0;

	public function __construct(){
		parent::__construct();
	}

	public function setId($idUser){
		//Il va chercher en BDD toutes les informations de l'utilisateur
		//et il va alimenter l'objet avec toutes ces données
		$this->idUser = $idUser;
	}

	public function getId(){
		return $this->idUser;
	}

	public function setLastname($lastname){
		$this->lastname = $lastname;
	}
	public function setFirstname($firstname){
		$this->firstname = $firstname;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function setPwd($password){
		$this->password = $password;
	}
	public function setPseudo($pseudo){
		$this->pseudo = $pseudo;
	}
	public function setCreatedAtUser($createdAtUser){
		$this->createdAtUser = $createdAtUser;
	}
	// public function setCountry($country){
	// 	$this->country = $country;
	// }
	// public function setStatus($status){
	// 	$this->status = $status;
	// }
	public function setRole($role){
		$this->role = $role;
	}
	public function setConfirmKey($confirmKey){
		$this->confirmKey = $confirmKey;
	}
	// public function setCountry($country){
	// 	$this->country = $country;
	// }
	// public function setStatus($status){
	// 	$this->status = $status;
	// }
	// public function setIsDeleted($isDeleted){
	// 	$this->isDeleted = $isDeleted;
	// }


	public function buildFormRegister(){
		return 
		[

			"config"=>
			[
				"method"=>"POST",
				"Action"=>"/login",
				"Submit"=>"S'inscrire",
				"class"=>"shadow-box-square col-m-8 col-l-4"
			],

			"input"=>[
				"firstname"=>[
					"type"=>"text",
					"name"=>"firstname",
					"label"=>"Prénom :",
					"class"=>"input",
					"autocomplete"=>"given-name",
					"lengthMax"=>"120",
					"lengthMin"=>"2",
					"required"=>true,
					"error"=>"Votre prénom doit faire entre 2 et 120 caractères"
				],
				"lastname"=>[
					"type"=>"text",
					"name"=>"lastname",
					"class"=>"input",
					"autocomplete"=>"family-name",
					"label"=>"Nom :",
					"lengthMax"=>"255",
					"lengthMin"=>"2",
					"required"=>true,
					"error"=>"Votre nom doit faire entre 2 et 255 caractères"
				],
				"email"=>[
					"type"=>"email",
					"label"=>"Adresse e-mail :",
					"class"=>"input",
					"autocomplete"=>"email",
					"required"=>true,
					"error"=>"Votre e-mail n'est pas valide",
					"error2"=>"Cet e-mail est déjà utilisé"
				],
				"pwd"=>[
					"type"=>"password",
					"label"=>"Mot de passe :",
					"class"=>"input",
					"lengthMin"=>"8",
					"required"=>true,
					"error"=>"Votre mot de passe doit faire plus de 8 caractères"
				],
				"pwdConfirm"=>[
					"type"=>"password",
					"label"=>"Confirmer le mot de passe :",
					"class"=>"input",
					"required"=>true,
					"error"=>"Les deux mots de passe ne correspondent pas"
				],
				"checkbox"=>[
					"type"=>"checkbox",
					"label"=>"J'ai lu et j'accepte la <a href ='#'>politique de confidentialité</a>",
					"class"=>"",
					"required"=>true
				]		
			]
		];
	}

}









