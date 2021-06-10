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

	public function getActualId(){
		echo $_SESSION['email'];
	}

	public function redirect_to_login(){
		header('/login');
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

	public function setConfirmKey($confirmKey){
		$this->confirmKey = $confirmKey;
	}

	
	
	public function buildFormRegister(){
		return [

				"config"=>[
					"method"=>"POST",
					"Action"=>"",
					"Submit"=>"S'inscrire",
					"class"=>"form_register"
				],
				"input"=>[
					"lastname"=>[
									"type"=>"text",
									"lengthMax"=>"255",
									"lengthMin"=>"2",
									"required"=>true,
									"error"=>"Votre nom doit faire entre 2 et 255 caractères",
									"placeholder"=>"Votre nom"
									],
					"firstname"=>[
									"type"=>"text",
									"class"=>"form_input",
									"label"=>"Prénom",
									"lengthMax"=>"120",
									"lengthMin"=>"2",
									"required"=>true,
									"error"=>"Votre prénom doit faire entre 2 et 120 caractères",
									"placeholder"=>"Votre prénom"
									],
					"email"=>[
									"type"=>"email",
									"lengthMax"=>"320",
									"lengthMin"=>"8",
									"required"=>true,
									"error"=>"Votre email doit faire entre 8 et 320 caractères",
									"placeholder"=>"Votre email"
									],
					"pwd"=>[
									"type"=>"password",
									"lengthMin"=>"8",
									"required"=>true,
									"error"=>"Votre mot de passe doit faire plus de 8 caractères",
									"placeholder"=>"Votre mot de passe"
									],
					"pwdConfirm"=>[
									"type"=>"password",
									"confirm"=>"pwd",
									"required"=>true,
									"error"=>"Votre mot de passe de confirmation est incorrect",
									"placeholder"=>"Confirmation"
									]
				]

			];
	}

	public function buildFormLogin(){
		return [

				"config"=>[
					"method"=>"POST",
					"Action"=>"",
					"Submit"=>"Se connecter",
					"class"=>"shadow-box-square col-m-8 col-l-4"
				],
				"input"=>[
					
					"email"=>[
									"type"=>"email",
									"label"=>"Adresse e-mail :",
									"class"=>"input",
									"autocomplete"=>"email",
									"required"=>true,
									"error"=>"Votre e-mail n'est pas valide",
									],
					"pwd"=>[
									"type"=>"password",
									"label"=>"Mot de passe :",
									"class"=>"input",
									"lengthMin"=>"8",
									"required"=>true,
									"error"=>"Votre mot de passe doit faire plus de 8 caractères"
										],

				]

			];
	}

	public function buildFormRecuperation(){
		return [

				"config"=>[
					"method"=>"POST",
					"Action"=>"/tableau-de-bord",
					"Submit"=>"Valider",
					"class"=>"shadow-box-square col-m-8 col-l-4"
				],
				"input"=>[
					
					"recup_mail"=>[
								"type"=>"email",
								"lengthMax"=>"320",
								"lengthMin"=>"8",
								"required"=>true,
								"class"=>"input",
								"error"=>"Votre email doit faire entre 8 et 320 caractères",
								"placeholder"=>"Veuillez renseigner votre email",
								"error2"=>"Ce mail n'existe pas dans notre base de données",

					],
			
				]

			];
	}

	public function buildFormChangementMdp(){
		return [

			"config"=>[
				"method"=>"POST",
				"Action"=>"",
				"Submit"=>"Valider",
				"class"=>"shadow-box-square col-m-8 col-l-4"
			],
			"input"=>[
				
				"confirmation_key"=>[
					"type"=>"password",
					"label"=>"Code envoyé par mail",
					"class"=>"input",
					"lengthMin"=>"8",
					"required"=>true,
				],

				"pwd"=>[
					"type"=>"password",
					"label"=>"Nouveau mot de passe :",
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
		
			]

		];
	}
	

}









