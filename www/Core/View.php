<?php

namespace App\Core;

use App\Core\Form;

class View
{
	// front_tpl.php
	private $template; // front ou back
	// default_view.php
	private $view; // default, dashboard, profile, ....
	private $data = [];

	public function __construct($view="default", $template="back"){
		$this->setTemplate($view, $template);
		$this->setView($view);
		
	}

	public function setTemplate($view, $template){
		if(file_exists("Views/Templates/".$template."_tpl.php") && $view != "register"){
			$this->template = "Views/Templates/".$template."_tpl.php";
		}
		elseif($view==="register"){
			$this->template = null;
		}
		else{
			die("Le template n'existe pas");
		}
	}

	public function setView($view){
		if(file_exists("Views/".$view."_view.php")){
			$this->view = "Views/".$view."_view.php";
		}else{
			die("La vue n'existe pas");
		}
	}

	public function assign($key, $value){
		$this->data[$key] = $value;
	}



	public function __destruct(){
		// $this->data = ["pseudo"=>"Prof"];  ----> $pseudo = "Prof";
			extract($this->data);
			if (is_null($this->template)){
				include $this->view;
			}
			else{
				include $this->template;
			}
	}
}




