<?php
namespace App\Models;

use App\Core\Database;

class Article extends Database
{
    //VARIABLES

    private $idArticle;
    protected $title;
    protected $content;
    protected $createdAt;

    public function __construct(){
        parent::__construct();
    }

    //SETTERS

    public function setId($idArticle){
		$this->idArticle = $idArticle;
	}

    public function getId(){
		return $this->idArticle;
	}

    public function setTitle($title){
        $this->title = $title;
    }

    public function setContent($content){
        $this->content = $content;
    }


   

    public function buildFormAddArticle(){
        return [

                "config"=>[
                    "method"=>"POST",
                    "Action"=>"",
                    "Submit"=>"Enregistrer",
                    "class"=>"form_addArticle"
                ], 
                "input"=>[
                    "titre"=>[
                                        "type"=>"input",
                                        "class"=>"form_input form__field",
                                        "placeholder"=>"Titre",
                                        "required"=>true, 
                                        "lengthMin"=>"2",
                                        "error"=>"Le titre doit avoir au moins deux caractères"

                    ]
                ],
                "textarea"=>[
                    "contenu"=>[
                                        "class"=>"addArticle_content",
                                        "required"=>true,
                                        "lenghtMin"=>"1",
                                        "placeholder"=>"Tapez votre texte ici",
                                        "error"=>"Le contenu de votre article ne peut être vide "
                    ]
                    ]
            //    "select"=>[
            //         "page"=>[
            //                             "class"=>"combo-box"
            //         ]
            //     ],
            //    "option"=>[
            //        "page"=>[
            //                             "value"=>"page"
            //        ]
              // ]
        ];
    }
}