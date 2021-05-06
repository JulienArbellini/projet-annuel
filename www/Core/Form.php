<?php

namespace App\Core;

class Form
{

	public static function validator($data, $config){
		$errors = [];

		// Vérifier si on a le bon nombre d'inputs
		if( count($data) == count($config["input"])){

			foreach ($config["input"] as $name => $configInput) {
				
				if( !empty($configInput["lengthMin"]) 
					&& is_numeric($configInput["lengthMin"]) 
					&& strlen($data[$name])<$configInput["lengthMin"] ){
					
					$errors[] = $configInput["error"];

				}

			}

		}else{
			$errors[] = "Tentative de Hack (Faille XSS)";
		}

		return $errors; //tableau des erreurs
	}





	public static function showForm($form){
		$html = "<form class='".($form["config"]["class"]??"")."' method='".( self::cleanWord($form["config"]["method"]) ?? "GET" )."' action='".( $form["config"]["action"] ?? "" )."'>";


		foreach ($form["input"] as $name => $dataInput) {

			$html .= "<input 
						id='".$name."'
			 			class='".($dataInput["class"]??"")."' 
						name='".$name."'
						type='".($dataInput["type"] ?? "text")."'
						placeholder='".($dataInput["placeholder"] ?? "")."'
						".((!empty($dataInput["required"]))?"required='required'":"")."
						>";


		}


		$html .= "<input type='submit' value='".( self::cleanWord($form["config"]["Submit"]) ?? "Valider" )."'></form>";


		echo $html;
	}

	public static function showFormLogin($form){
		$html = "<form class='".($form["config"]["class"]??"")."' method='".( self::cleanWord($form["config"]["method"]) ?? "GET" )."' action='".( $form["config"]["action"] ?? "" )."'>";


		foreach ($form["input"] as $name => $dataInput) {

			$html .= "<input 
						id='".$name."'
			 			class='".($dataInput["class"]??"")."' 
						name='".$name."'
						type='".($dataInput["type"] ?? "text")."'
						placeholder='".($dataInput["placeholder"] ?? "")."'
						".((!empty($dataInput["required"]))?"required='required'":"")."
						>";


		}
		
				
		$html .= "<input type='checkbox' onclick='Afficher()'> Afficher le mot de passe
		<script>
		function Afficher()
		{ 
		var input = document.getElementById('pwd'); 
		if (input.type === 'password')
		{ 
		input.type = 'text'; 
		} 
		else
		{ 
		input.type = 'password'; 
		} 
		} 
		</script>";

		$html .= "<input type='submit' value='".( self::cleanWord($form["config"]["Submit"]) ?? "Valider" )."'></form>";

		$html .= "<a href='\mot-de-passe-oublie'>Mot de passe oublié ?</a>";


		echo $html;
	}



	public static function showFormRecuperation($form){
				
		$html = "<form class='".($form["config"]["class"]??"")."' method='".( self::cleanWord($form["config"]["method"]) ?? "GET" )."' action='".( $form["config"]["action"] ?? "" )."'>";
		$html .= "<h2>Récupération de mot de passe</h2>";
		$html .= "<input type='email' placeholder='Votre adresse e-mail' name='recup_mail' ></input>";


		


		$html .= "<input type='submit' name='recup_submit' value='".( self::cleanWord($form["config"]["Submit"]) ?? "Valider" )."'></form>";
		if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } else { echo ""; }


		echo $html;
	}

	public static function cleanWord($word){
		return str_replace("'", "&apos;", $word);
	}

}