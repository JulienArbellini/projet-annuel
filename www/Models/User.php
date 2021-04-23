<?php
namespace App\Models;

use App\Core\Database;

class User extends Database
{
    private $idUser;
    protected $lastname;
    protected $firstname;
    protected $email;
    protected $password;
    //protected $country;
    // protected $status = 0;
    // protected $isDeleted = 0;

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
    public function setPassword($password){
        $this->password = $password;
    }
    /*public function setCountry($country){
        $this->country = $country;
    }
    public function setStatus($status){
        $this->status = $status;
    }*/
    public function setRole($role){
        $this->role = $role;
    }
    /*public function setIsDeleted($isDeleted){
        $this->isDeleted = $isDeleted;
    }*/


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

    // public function buildFormUpdateUser(){
    //     return [

    //             "config"=>[
    //                 "method"=>"GET",
    //                 "Action"=>"",
    //                 "Submit"=>"Enregistrer",
    //                 "class"=>"form_update"
    //             ],
    //             "input"=>[
    //                 "pseudo"=>[
    //                                 "type"=>"text",
    //                                 "label"=>"Pseudo"
    //                                 ],
    //                 "firstname"=>[
    //                                 "type"=>"text",
    //                                 "label"=>"Prénom",
    //                                 "class"=>"form_update"
    //                                 ],
    //                 "lastname"=>[
    //                                 "type"=>"text",
    //                                 "label"=>"Nom"
    //                                 ],
    //                 "email"=>[
    //                                 "type"=>"text",
    //                                 "label"=>"Adresse email"
    //                                 ],
                    
    //                 ],

    //             "select"=>[
    //                 "Role_idRole"=>[
    //                         // "type"=>"select",
    //                         "label"=>"Rôle"
    //                         ]
    //             ]
    //         ];
    // }

    public function buildFormAddUser(){
        return [

            "config"=>[
                "method"=>"POST",
                "Action"=>"",
                "Submit"=>"Ajouter",
                "class"=>"form_add"
            ],
            "input"=>[
                "email"=>[
                            "type"=>"text",
                            "label"=>"Adresse email",
                            "placeholder"=>"votre@adresse.com"
                            ],
            ],

            "select"=>[
                "Role_idRole"=>[
                            "label"=>"Attribuer un rôle"
                                ],
            ]
        ];
    }

}









