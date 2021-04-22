<?php
namespace App\Models;

use App\Core\Database;

class User extends Database
{
	private $idUser=null;
	protected $lastname;
	protected $firstname;
	protected $email;
	protected $password;
	//protected $country;
	//protected $status = 0;
	//protected $role = 0;
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
	// public function setCountry($country){
	// 	$this->country = $country;
	// }
	// public function setStatus($status){
	// 	$this->status = $status;
	// }
	public function setRole($role){
		$this->role = $role;
	}
	// public function setIsDeleted($isDeleted){
	// 	$this->isDeleted = $isDeleted;
	// }


	public function buildFormRegister(){
		return 
		[

			"config"=>
			[
				"method"=>"POST",
				"Action"=>"",
				"Submit"=>"S'inscrire",
				"class"=>"shadow-box-square col-m-8 col-l-4"
			],

			"input"=>[
				"firstname"=>[
					"type"=>"text",
					"name"=>"first",
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
					"lengthMax"=>"320",
					"lengthMin"=>"8",
					"required"=>true,
					"error"=>"Votre email doit faire entre 8 et 320 caractères",
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
					"confirm"=>"pwd",
					"required"=>true,
					"error"=>"Votre mot de passe de confirmation est incorrect"
				],
				"checkbox"=>[
					"type"=>"checkbox",
					"label"=>"J'ai lu et j'accepte la <a href ='#'>politique de confidentialité</a>",
					"class"=>"",
					"required"=>true,
					"error"=>"Les mots de passe ne correspondent pas"
				]		
			]
		];
	}

}









