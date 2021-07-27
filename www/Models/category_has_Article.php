<?php
namespace App\Models;

use App\Core\Database;

class category_has_Article extends Database{
    protected $Category_idCategory;
    protected $Article_idArticle;

    public function __construct(){
        parent::__construct();
    }

    public function getId(){
		return $this->id;
	}

    public function setCategory_idCategory($Category_idCategory){
        $this->Category_idCategory = $Category_idCategory;
    }

    public function setArticle_idArticle($Article_idArticle){
        $this->Article_idArticle = $Article_idArticle;
    }
}