<?php
namespace App\Models;

use App\Core\Database;

class Page extends Database{

    private $idPage;
    protected $title;
    protected $content;
    protected $createdAt;

    public function __construct(){
        parent::__construct();
    }

    public function setId($idPage){
        $this->idPage = $idPage;
    }

    public function getId(){
		return $this->idPage;
	}

    public function setTitle($title){
        $this->title = $title;
    }

    public function setContent($content){
        $this->content = $content;
    }
}