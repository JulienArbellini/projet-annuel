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

		// foreach($data as $key => $value){

		$html = "<form class='".($form["config"]["class"]??"")."' method='".( self::cleanWord($form["config"]["method"]) ?? "GET" )."' action='".( $form["config"]["action"] ?? "" )."'>";

		
			foreach ($form["input"] as $name => $dataInput) {

				// foreach($data as $key => $value){
				$html .="<div class='details-part'>";

				$html .="<label for='".$name."'>".($dataInput["label"]??"")." </label>";

				$html .= "<input 
							id='".$name."'
							class='".($dataInput["class"]??"")."' 
							name='".$name."'
							type='".($dataInput["type"] ?? "text")."'
							placeholder='".($dataInput["placeholder"] ?? "")."'
							".((!empty($dataInput["required"]))?"required='required'":"")."
							>";

				$html .="</div>";
			// $html .= "<p>".$data[0]['pseudo']."<p>";

			// }
			}


		foreach ($form["select"] as $name => $dataSelect) {

			$html .="<label for='".$name."'>".($dataSelect["label"]??"")." </label>";

			$html .="<div class='details-part'>";

			$html .= "<select>
						type='".($dataSelect["type"] ?? "")."'
						<option value='Administrator'>Administrator
					</select>";
					
			$html .="</div>";
		}
		// }

		
		

		// $html .= "<input type='submit' value='".( self::cleanWord($form["config"]["Submit"]) ?? "Valider" )."'></form>";


		echo $html;
	}




	public static function cleanWord($word){
		return str_replace("'", "&apos;", $word);
	}

}