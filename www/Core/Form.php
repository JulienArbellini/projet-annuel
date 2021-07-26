<?php

namespace App\Core;
class Form
{

	public static function validatorAddUserForm($data, $config){
		$nbrInput = count($config["input"]);
		$nbrSelect = count($config["select"]);
		$nbrTotal = $nbrInput + $nbrSelect;
		$errors = [];
		global $mailexists;

		// Vérifier si on a le bon nombre d'inputs
		if( count($data) == $nbrTotal){
			foreach ($config["input"] as $name => $configInput) {
				
				if((!empty($configInput["lengthMin"])
					&& is_numeric($configInput["lengthMin"]) 
					&& strlen($data[$name])<$configInput["lengthMin"])
					|| (!empty($configInput["lengthMax"])
					&& is_numeric($configInput["lengthMax"])
					&& strlen($data[$name])>$configInput["lengthMax"])) {
					
					$errors[] = $configInput["error"];

				}
			}
		} else{
			$errors[] = "Tentative de Hack (Faille XSS)";
		}

		return $errors; //tableau des erreurs 
	}

	public static function validator($data, $config){
		global $mailexists;
		$errors = [];
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

		if(!(filter_var($data["email"], FILTER_VALIDATE_EMAIL))) {
            $errors[] .= $config["input"]["email"]["error"];
        }

        if($mailexists === 1){
            $errors[].= $config["input"]["email"]["error2"];
        }

        if($data["pwdConfirm"] != $data["pwd"]) {
            $errors[] .= $config["input"]["pwdConfirm"]["error"];
        }
		
		if ($_SERVER['REQUEST_URI']==='/mot-de-passe-oublie' || $_SERVER['REQUEST_URI']==='/s-inscrire'){
			if(!(filter_var($data["email"], FILTER_VALIDATE_EMAIL)) ) {
				$errors[] .= $config["input"]["email"]["error"];
			}
		}

		if($_SERVER['REQUEST_URI']==='/mot-de-passe-oublie'){
			if($mailexists === 0){
				$errors[].= $config["input"]["email"]["error2"];
			}
			
		}


		return $errors; //tableau des erreurs
	}

	public static function validatorProfile($data, $config){
		$errors = [];
		$count = count($data);
		if( $count == count($config["input"])){

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
			
		return $errors; //tableau des erreurs
	}

	public static function showForm($form){
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
						autocomplete='".($dataInput["autocomplete"] ?? "")."'
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

		$html .= "<div> <button type='submit' class ='button' id='btn_register'";
		$html .= ">S'inscrire</button> </div> </form>";

		echo $html;
		
	}

	public static function showFormProfile($form, $data) {
		$html = "<form id='".($form["config"]["id"]??"")."' class='".($form["config"]["class"]??"")."' method='".( self::cleanWord($form["config"]["method"]) ?? "GET" )."' action='".( $form["config"]["action"] ?? "" )."'>";

		foreach ($form["input"] as $name => $dataInput) {
			foreach($data as $key => $value) {
				$html .="<div class='form-group'> <label  class='control-label' for='".$name."'>".($dataInput["label"]??"")." </label>";
				$html .= "<input
					autocomplete='".($dataInput["autocomplete"]??"")."'
					id='".$name."'
					class='".($dataInput["class"]??"")."' 
					name='".$name."'
					type='".($dataInput["type"] ?? "text")."'
					value='".($data[0][$name] ?? "")."'
					disabled=disabled'
					placeholder='".($dataInput["placeholder"] ?? "")."'
					".((!empty($dataInput["required"]))?"required='required'":"")."
					> </div>";
			}
		}

		$html .= "<input type='submit' name='submit_profile' class='button-profile' id='btn-profile' value='".( self::cleanWord($form["config"]["Submit"]) ?? "Valider" )."'></form>";
		
		echo $html;
	}

	public static function showFormLogin($form){

		$html = "<form  id='".($form["config"]["id"]??"")."' class='".($form["config"]["class"]??"")."' method='".( self::cleanWord($form["config"]["method"]) ?? "GET" )."' action='".( $form["config"]["action"] ?? "" )."'>";
		
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
						value='".($dataInput["value"] ?? "")."'
						autocomplete='".($dataInput["autocomplete"] ?? "")."'
						>
						";
						
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
						value='".($dataInput["value"] ?? "")."'
						> 
						
						</div>";
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
		$html .= "<input type='email' placeholder='Votre adresse e-mail' name='email' class='input'></input>";
		$html .= "<div class = form-group><button type='submit' class='button'>Valider</button></div> </form>";
		if(isset($error)) { echo '<span style="color:red">'.$error.'</span>'; } else { echo ""; }

	
		echo $html;
	}



	public static function showFormUser($form, $data){

		$html = "<form class='".($form["config"]["class"]??"")."' method='".( self::cleanWord($form["config"]["method"]) ?? "GET" )."' action='".( $form["config"]["action"] ?? "" )."'>";

		
			foreach ($form["input"] as $name => $dataInput) {

				$html .="<div class='details-part'>";

				$html .="<label for='".$name."'>".($dataInput["label"]??"")." :</label>";

				$html .= "<input 
							id='".$name."'
							class='".($dataInput["class"]??"")."' 
							name='".$name."'
							type='".($dataInput["type"] ?? "text")."'
							placeholder='".($dataInput["placeholder"] ?? "")."'
							".((!empty($dataInput["required"]))?"required='required'":"")."
							>";

				$html .="</div>";
			}


		foreach ($form["select"] as $name => $dataSelect) {

			

					$html .="<div class='details-part'>";

					$html .="<label for='".$name."'>".($dataSelect["label"]??"")." :</label>";

					$html .= "<select name='".$name."'>
								<option value=''>Sélectionner...</option>";
								foreach($data as $key => $value){
									$html .="<option value='".($value['id'])."'>".($value['status'])."</option>";
								}
							
					$html .= "</select>";
							
					$html .="</div>";

			
		}
		
		$html .= "<div class='container2'>";
		$html .= "<button class='js-modal-close'>Annuler</button>";
		$html .= "<button class='js-modal-stop' value='".( self::cleanWord($form["config"]["Submit"]) ?? "Valider" )."'>Enregistrer</button>";
		$html .= "</div>";
		$html .= "</form>";


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

