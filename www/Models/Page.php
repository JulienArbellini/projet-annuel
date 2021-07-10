<?php
namespace App\Models;

use App\Core\Database;

class Page extends Database{

    private $id;
    protected $title;
    protected $content;
    protected $slug;
    protected $createdAt;
    protected $page_accueil;

    public function __construct(){
        parent::__construct();
    }

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

    public function setPageAccueil($page_accueil){
        $this->page_accueil = $page_accueil;
    }

    public function getNumberPage(){
        return $this->lastId();
    }
}