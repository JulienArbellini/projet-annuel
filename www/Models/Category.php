<?php
namespace App\Models;

use App\Core\Database;

class Category extends Database{
    private $id;
    protected $category_name;

    public function __construct(){
        parent::__construct();
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
		return $this->id;
	}

    public function setCategoryName($category_name){
        $this->category_name = $category_name;
    }
}