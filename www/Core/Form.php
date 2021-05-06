<?php

namespace App\Core;
class Form
{

	public static function validator($data, $config){
		$errors = [];
		global $mailexists;
		/*
		echo "<pre>";
		print_r($data); 
		print_r($config);
		echo "</pre>";
		*/
		// Vérifier si on a le bon nombre d'inputs
		if(count($data) == count($config["input"])){
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

	public static function cleanWord($word){
		return str_replace("'", "&apos;", $word);
	}

}
