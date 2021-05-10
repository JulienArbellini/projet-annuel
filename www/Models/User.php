<?php
namespace App\Models;


use App\Core\Database;

// require 'vendor/autoload.php'; // intégrer dans index.php

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
    //protected $country;
    // protected $status = 0;
    // protected $isDeleted = 0;

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
    /*public function setCountry($country){
        $this->country = $country;
    }
    public function setStatus($status){
        $this->status = $status;
    }*/
    public function setRole($Role_idRole){
        $this->Role_idRole = $Role_idRole;
    }
    public function setConfirmKey($confirmKey){
		$this->confirmKey = $confirmKey;
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
    //                 "firstname"=>[
    //                                 "type"=>"text",
    //                                 "label"=>"Prénom",
    //                                 "lengthMax"=>"120",
    //                                 "lengthMin"=>"2",
    //                                 "required"=>true,
    //                                 "error"=>"Votre prénom doit faire entre 2 et 120 caractères",
    //                                 ],
    //                 "lastname"=>[
    //                                 "type"=>"text",
    //                                 "label"=>"Nom",
    //                                 "lengthMax"=>"255",
    //                                 "lengthMin"=>"2",
    //                                 "required"=>true,
    //                                 "error"=>"Votre nom doit faire entre 2 et 255 caractères",
    //                                 ]
                    
    //                 ],

    //             "select"=>[
    //                 "role"=>[
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



    // public function mailer(){

    //     $mail = new PHPMailer(true);
    //         try{
    //             // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    //             $mail->isSMTP();
    //             $mail->Host = 'ssl://smtp.gmail.com';
    //             $mail->SMTPAuth = true;
    //             $mail->Username = 'teachr.contact.pa@gmail.com';
    //             $mail->Password = PHPMailer::PWD;
    //             $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    //             $mail->Port = 465;
    //             $mail->setFrom('teachr.contact.pa@gmail.com', 'Teachr Contact');
    //             $mail->addAddress($_SESSION['tab'][0]['email'], $_SESSION['tab'][0]['pseudo']);
    //             $mail->addAttachment('./teachr.sql');         //Add attachments
    //             // $mail->addAttachment('./var/tmp/utilisateur.png', 'new.png');
    //             $mail->isHTML(true);
    //             $mail->Subject = 'Invitation à rejoindre un projet';
    //             $mail->Body    = '<html>
    //                                 <head>
    //                                     <meta charset= "UTF-8"/>
    //                                 </head>
    //                                 <body>
    //                                     <h1>Bienvenue sur Teachr !</h1></br>
    //                                     <p>L\'utilisateur John Doe vous invite à rejoindre son projet sur notre plateforme.</br>
    //                                     Pour y accéder :</p></br>
    //                                         <ol>
    //                                             <li>Installez un serveur web (MAMP, WAMP, XAMP)</li></br>
    //                                             <li>Télécharger la pièce jointe et importez la dans phpmyadmin, la base de données sera alors créée</li></br>
    //                                             <li>Rendez-vous à l\'adresse suivante : http://localhost/login</li></br>
    //                                         </ol>
    //                                             <p>Vous pouvez vous connecter avec les identifiants suivants :</p>
    //                                         <ol style="list-style: none;">
    //                                             <li> - pseudo : '.$_SESSION['tab'][0]['pseudo'].'</li>
    //                                             <li> - mot de passe : '.$_SESSION['tab'][0]['password'].'</li></br>
    //                                         </ol>
    //                                         <p>Toute l\'équipe vous souhaite la bienvenue sur teachr</br>
    //                                             https://teachr.com</p>
    //                                 </body>
    //                               </html>';
    //             $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    //             $mail->send();
    //             echo 'Message has been sent';
    //         }
    //         catch (Exception $e){
    //             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //         }
    // }

}









