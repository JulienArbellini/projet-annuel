<?php

namespace App\Core;

class Form
{

	public static function validator($data, $config){
		$errors = [];

		// Vérifier si on a le bon nombre d'inputs
		if( count($data) == count($config["input"])){
			//echo "<pre>";
			//print_r($config["input"]);
			foreach ($config["input"] as $name => $configInput) {
				
				if(!empty($configInput["lengthMin"]) 
					&& is_numeric($configInput["lengthMin"]) 
					&& strlen($data[$name])<$configInput["lengthMin"] 
					&& $config["input"]["pwd"] != $config["input"]["pwdConfirm"]){
					
					$errors[] = $configInput["error"];

				}
			}

		}else{
			$errors[] = "Tentative de Hack (Faille XSS)";
		}

		return $errors; //tableau des erreurs
	}


	public static function showForm($form){
		//$html ="<div class='row col-m-12 col-m-up-2'>";

		$html = "<form class='".($form["config"]["class"]??"")."' method='".( self::cleanWord($form["config"]["method"]) ?? "GET" )."' action='".( $form["config"]["action"] ?? "" )."'>";
		//echo "<pre>";
		//print_r ($form["input"]["checkbox_register"]["name"]);
		
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

		$html .= "<div class = form-group> <input type='submit' class ='button' value='".( self::cleanWord($form["config"]["Submit"]) ?? "Valider" )."'> </div> </form>";

		echo $html;
	}




	public static function cleanWord($word){
		return str_replace("'", "&apos;", $word);
	}

}
