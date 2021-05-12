<?php

namespace App\Core;

class Form
{

	public static function validator($data, $config){
		$nbrInput = count($config["input"]);
		$nbrSelect = count($config["select"]);
		$nbrTotal = $nbrInput + $nbrSelect;
		$errors = [];

		// Vérifier si on a le bon nombre d'inputs
		if( count($data) == $nbrTotal){

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

		$html .= "<div class = form-group> <button type='submit' class ='button' id='btn_register'";
		$html .= ">S'inscrire</button> </div> </form>";

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

}