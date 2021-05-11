<?php
namespace App\Models;

use App\Core\Database;

class Article extends Database
{
    //VARIABLES

    private $id;
    protected $title;
    protected $content;
    protected $slug = null;
    protected $createdAt;

    public function __construct(){
        parent::__construct();
    }

    //SETTERS

    public function setId($id){
		$this->id = $id;
	}

    public function getId(){
		return $this->id;
	}

    public function setTitle($title){
        $this->title = $title;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function setCreatedAt($createdAt){
        $this->createdAt = $createdAt;
    }

    public function setSlug($slug){
        $this->slug = $slug;
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

                    ],
                    "slug"=>[
                                        "type"=>"text",
                                        "class"=>"form_input form__field",
                                        "placeholder"=>"/Slug",
                                        "required"=>true,
                                        "lenghtMin"=>"2",
                                        "error"=>"Le slug doit avoir au moins deux caractères"
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

        ];
    }
}