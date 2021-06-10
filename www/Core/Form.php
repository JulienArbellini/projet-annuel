<?php

namespace App\Core;

class Form
{

	public static function validator($data, $config){
		global $mailexists;
		$errors = [];
		// echo $data['recup_mail'];
		// Vérifier si on a le bon nombre d'inputs
		// echo count($data);
		// echo count($config["input"]);
		if( count($data) == count($config["input"])){

			foreach ($config["input"] as $name => $configInput) {
				
				if( !empty($configInput["lengthMin"]) 
					&& is_numeric($configInput["lengthMin"]) 
					&& strlen($data[$name])<$configInput["lengthMin"] ){
					
					$errors[] = $configInput["error"];

				}

			}
		}

		else{
			$errors[] = "Tentative de Hack (Faille XSS)";
		}
		if ($_SERVER['REQUEST_URI']==='/mot-de-passe-oublie' || $_SERVER['REQUEST_URI']==='/s-inscrire'){
			if(!(filter_var($data["recup_mail"], FILTER_VALIDATE_EMAIL)) ) {
				$errors[] .= $config["input"]["recup_mail"]["error"];
			}
		}

		if($_SERVER['REQUEST_URI']==='/mot-de-passe-oublie'){
			if($mailexists === 0){
				$errors[].= $config["input"]["recup_mail"]["error2"];
			}
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
			if ($name === "checkbox")
			{
				$html .= "<div class='form-group'> <input 
						id='".$name."'
			 			class='".($dataInput["class"]??"")."' 
						name='".$name."'
						type='".($dataInput["type"] ?? "text")."'
						placeholder='".($dataInput["placeholder"] ?? "")."'
						".((!empty($dataInput["required"]))?"required='required'":"")."
						>";
				$html .="<label class='checkbox-label' for='".$name."'>".($dataInput["label"]??"")." </label> </div>";
			} else {
				$html .="<div class='form-group'> <label  class='control-label' for='".$name."'>".($dataInput["label"]??"")." </label>";
				$html .= "<input
						autocomplete='".($dataInput["autocomplete"]??"")."'
						id='".$name."'
			 			class='".($dataInput["class"]??"")."' 
						name='".$name."'
						type='".($dataInput["type"] ?? "text")."'
						placeholder='".($dataInput["placeholder"] ?? "")."'
						".((!empty($dataInput["required"]))?"required='required'":"")."
						> </div>";
			}
				

		}
		$html .= "<div class='affichermdp'>
					<input class='checkbox' type='checkbox' onclick='Afficher()'>
					<label>Afficher/Masquer le mot de passe</label>
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
		</script></input></div>";

		$html .= "<div class = form-group> <button type='submit' class ='button' id='btn_register'";
		$html .= ">Se connecter</button> </div> </form>";

		echo $html;
	}


	public static function showFormRecuperation($form){
				
		$html = "<form class='".($form["config"]["class"]??"")."' method='".( self::cleanWord($form["config"]["method"]) ?? "GET" )."' action='".( $form["config"]["action"] ?? "" )."'>";
		$html .= "<h2>Récupération de mot de passe</h2>";
		$html .= "<input type='email' placeholder='Votre adresse e-mail' name='recup_mail' class='input'></input>";
		$html .= "<div class = form-group><button type='submit' class='button'>Valider</button></div> </form>";
		if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } else { echo ""; }

	
		echo $html;
	}

	public static function cleanWord($word){
		return str_replace("'", "&apos;", $word);
	}

	public function showFormChangementMdp($form){
		$html = "<form class='".($form["config"]["class"]??"")."' method='".( self::cleanWord($form["config"]["method"]) ?? "GET" )."' action='".( $form["config"]["action"] ?? "" )."'>";
		
		foreach ($form["input"] as $name => $dataInput) {
			if ($name === "checkbox")
			{
				$html .= "<div class='form-group'> <input 
						id='".$name."'
			 			class='".($dataInput["class"]??"")."' 
						name='".$name."'
						type='".($dataInput["type"] ?? "text")."'
						placeholder='".($dataInput["placeholder"] ?? "")."'
						".((!empty($dataInput["required"]))?"required='required'":"")."
						>";
				$html .="<label class='checkbox-label' for='".$name."'>".($dataInput["label"]??"")." </label> </div>";
			} else {
				$html .="<div class='form-group'> <label  class='control-label' for='".$name."'>".($dataInput["label"]??"")." </label>";
				$html .= "<input
						autocomplete='".($dataInput["autocomplete"]??"")."'
						id='".$name."'
			 			class='".($dataInput["class"]??"")."' 
						name='".$name."'
						type='".($dataInput["type"] ?? "text")."'
						placeholder='".($dataInput["placeholder"] ?? "")."'
						".((!empty($dataInput["required"]))?"required='required'":"")."
						> </div>";
			}
				

		}
		$html .= "<div class='affichermdp'>
					<input class='checkbox' type='checkbox' onclick='Afficher()'>
					<label>Afficher/Masquer le mot de passe</label>
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
		</script></input></div>";

		$html .= "<div class = form-group> <button type='submit' class ='button' id='btn_register'";
		$html .= ">S'inscrire</button> </div> </form>";

		echo $html;
	}

}

