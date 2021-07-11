<?php
namespace App\Models;


use App\Core\Database;

date_default_timezone_set('Europe/Paris');

class User extends Database
{
    private $id=null;
    protected $lastname;
    protected $firstname;
    protected $email;
    protected $password;
    protected $pseudo;
    protected $createdAtUser;
    protected $Role_idRole = 1;
    protected $confirmKey;
	protected $confirmation;

    public function __construct(){
        parent::__construct();
    }

    public function setId($id){
        //Il va chercher en BDD toutes les informations de l'utilisateur
        //et il va alimenter l'objet avec toutes ces données
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
    public function setRole($Role_idRole){
        $this->Role_idRole = $Role_idRole;
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
	// public function setRole($role){
	// 	$this->role = $role;
	// }
	public function setConfirmKey($confirmKey){
		$this->confirmKey = $confirmKey;
	}

	public function setConfirmation($confirmation) {
		$this->confirmation = $confirmation;
	}


	
	
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
    

    public function buildFormAddUser(){
        return [

            "config"=>[
                "method"=>"POST",
                "Action"=>"",
                "Submit"=>"Enregistrer",
                "class"=>"form_add"
            ],
            "input"=>[
                "firstname"=>[
                            "type"=>"text",
                            "label"=>"Prénom",
                            "placeholder"=>"Prénom",
                            "lengthMax"=>"120",
                            "lengthMin"=>"2",
                            "required"=>true,
                            "error"=>"Votre prénom doit faire entre 2 et 120 caractères",
                            ],
                "lastname"=>[
                            "type"=>"text",
                            "label"=>"Nom",
                            "placeholder"=>"Nom",
                            "lengthMax"=>"255",
                            "lengthMin"=>"2",
                            "required"=>true,
                            "error"=>"Votre nom doit faire entre 2 et 255 caractères",
                            ],
                "email"=>[
                            "type"=>"email",
                            "label"=>"Adresse email",
                            "lengthMax"=>"320",
                            "lengthMin"=>"8",
                            "required"=>true,
                            "error"=>"Votre email doit faire entre 8 et 320 caractères",
                            "placeholder"=>"votre@adresse.com"
                            ],
                "pseudo"=>[
                            "type"=>"text",
                            "label"=>"Pseudo",
                            "placeholder"=>"Pseudo"
                            ],
                "password"=>[
                            "type"=>"password",
                            "label"=>"Mot de passe",
                            "lengthMin"=>"8",
                            "required"=>true,
                            "error"=>"Votre mot de passe doit faire plus de 8 caractères",
                            "placeholder"=>"Votre mot de passe"
                            ]   
            ],

            "select"=>[
                "role"=>[
                            "label"=>"Rôle",
                            "required"=>true,
                            "error"=>"Veuillez sélectionner un rôle",
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
					
					"email"=>[
								"type"=>"email",
								"lengthMax"=>"320",
								"lengthMin"=>"8",
								"required"=>true,
								"class"=>"input",
								"error"=>"Votre email doit faire entre 8 et 320 caractères",
								"placeholder"=>"Veuillez renseigner votre email",
								"error2"=>"Ce mail n'existe pas dans notre base de données"

					]
			
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









