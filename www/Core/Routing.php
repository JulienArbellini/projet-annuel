<?php

namespace App\Core;


class Routing{

	public $routesPath = "routes.yml";
	public $controller="Base";
	public $action="routesPagesArticlesAction";
	public $routes = [];
	public $slugs = [];


	public function __construct($uri){
		//Faut vérifier que le fichier existe
		$this->routes = yaml_parse_file($this->routesPath);
		//Faut vérifier qu'il y a un controller pour cette route
		if(!empty($this->routes[$uri])){
			$this->setController($this->routes[$uri]["controller"]);
			$this->setAction($this->routes[$uri]["action"]);
		}


		foreach ($this->routes as $slug=>$info) {
			$this->slugs[$info["controller"]][$info["action"]] = $slug;
		}

	}


	//PascalCase pour une class
	public function setController($controller){
		$this->controller=ucfirst(mb_strtolower($controller));
	}

	public function setAction($action){
		$this->action=$action."Action";
	}

	public function getController(){
		return $this->controller;
	}

	public function getAction(){
		return $this->action;
	}

	public function getControllerWithNamespace(){
		return APP_NAMESPACE.$this->controller;
	}


	/*
		/list-des-utilisateurs:
	  	controller: Security
	  	action: listofusers
	 */
	public function getUri($controller, $action){

		if(!empty($this->slugs[$controller]) && !empty($this->slugs[$controller][$action]))
			return $this->slugs[$controller][$action];


		die("Aucun route ne correspond à ".$controller." -> ".$action );
	}


}
