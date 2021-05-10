<?php
namespace App;


use App\Core\Routing; 
use App\Core\ConstantManager; 
// use App\Core\Database;

require "Autoloader.php";
Autoloader::register();

new ConstantManager();


$uriExploded = explode("?", $_SERVER["REQUEST_URI"]);
//  /ajout-d-un-utilisateur
$_SESSION["uri"] = $uriExploded[0];
// echo $uri;

$route = new Routing($_SESSION["uri"]);
$c = $route->getController();
$a = $route->getAction();
$dataSlug = $route->getAction();

$cWithNamespace = $route->getControllerWithNamespace();




//Appeler le bon controller et la bonne action en fonction de $c et $a
//et en faisant les bonnes vérifications

if( file_exists("./Controllers/".$c.".php")){

	include "./Controllers/".$c.".php";

	if(class_exists($cWithNamespace)){
		//$c = App\Security // User
		$cObject = new $cWithNamespace();
		// var_dump($cWithNamespace);

		if(method_exists($cObject, $a)){
			//$a = loginAction // defaultAction
			$cObject->$a();
			// var_dump($a);
		}else{

			$cObject->$a();
			
		}

	}else{
		die("La classe ".$c." n'existe pas"); 
	}

}else{
	die("Le fichier ".$c." n'existe pas");
}

//Vérifier que la route l'article/de la page existe, aller chercher dans la base de données le slug renseigné si le slug n'existe pas dans route va chercher dans la bdd
//et faire en sort qu'il affiche la page avec ce slug
//execution d'une requête SQL pour aller récupérer le slug
//Une fois le slug trouvé dans la bdd