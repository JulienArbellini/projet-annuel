<?php //session_start();?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Inscription</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<link rel="stylesheet" href="framework/dist/main.css">
	</head>
	<body>
		<div class=container>
			<div class="logo col-l-3">
				<img class="" src="../../framework/img/Logo teach'r.svg">
			</div> 
			<?php if(!empty($formErrors)):?>
				<?php foreach($formErrors as $error):?>
					<div class='error'>
						<li><?= $error ;?>
				<?php endforeach;?>
				</div>
			<?php endif;?>  
				
<?php App\Core\Form::showForm($form);?>
