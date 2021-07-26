<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Connexion</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<link rel="stylesheet" href="framework/dist/main.css">
	</head>
	<body>
		<div class="container">
			<div class="logo col-l-2">
				<img class="col-m-center" src="../../framework/img/Logo teach'r.svg">
			</div> 
			<?php if(!empty($formErrors)):?>
				<?php foreach($formErrors as $error):?>
					<div class='error'>
						<li><?= $error ;?>
				<?php endforeach;?>
				</div>
			<?php endif;?>  

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
</script>
<?php App\Core\Form::showFormLogin($form);?>


<a href='\mot-de-passe-oublie'>Mot de passe oublié ?</a>

<?php
	if(isset($_GET['erreur'])){
		$err = $_GET['erreur'];
		if($err==1 || $err==2)
			echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
	}
?>