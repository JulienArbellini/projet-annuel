<?php
namespace App\Models;


use App\Core\Database;

class User extends Database
{
    private $id=null;
    protected $lastname;
    protected $firstname;
    protected $email;
    protected $password;
    protected $pseudo;
    protected $Role_idRole = 1;
    protected $confirmkey;
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
    public function setLastname($lastname){
        $this->lastname = $lastname;
    }
    public function setFirstname($firstname){
        $this->firstname = $firstname;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }
    public function setRole($Role_idRole){
        $this->Role_idRole = $Role_idRole;
    }
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
                                    "label"=>"Nom",
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
                                    "label"=>"Email",
                                    "lengthMax"=>"320",
                                    "lengthMin"=>"8",
                                    "required"=>true,
                                    "error"=>"Votre email doit faire entre 8 et 320 caractères",
                                    "placeholder"=>"Votre email"
                                    ],
                    "pwd"=>[
                                    "type"=>"password",
                                    "label"=>"Mot de passe",
                                    "lengthMin"=>"8",
                                    "required"=>true,
                                    "error"=>"Votre mot de passe doit faire plus de 8 caractères",
                                    "placeholder"=>"Votre mot de passe"
                                    ],
                    "pwdConfirm"=>[
                                    "type"=>"password",
                                    "label"=>"Confirmation",
                                    "confirm"=>"pwd",
                                    "required"=>true,
                                    "error"=>"Votre mot de passe de confirmation est incorrect",
                                    "placeholder"=>"Confirmation"
                    ],
                    "checkbox"=>[
                        "type"=>"checkbox",
                        "label"=>"Choix 2",
                        "name"=>"Choix 1",
                        "required"=>true,
                        "error"=>"Cocher svp",
                    ],
                    "checkbox1"=>[
                        "type"=>"checkbox",
                        "label"=>"choix 1",
                        "name"=>"Choix 1",
                        "required"=>true,
                        "error"=>"Cocher svp",
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

}









