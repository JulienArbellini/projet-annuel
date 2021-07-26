<!DOCTYPE html>
<html lang="fr">
	<body>
		<div class=container>
			<div class="logo col-l-2">
				<img class="imagelogo" src="../../framework/img/Logo teach'r.svg">
			</div> 
			<?php  App\Core\Form::showFormRecuperation($form);?>
			<?php
			if(isset($errors)){
				var_dump($errors);
			}else{echo '';}
			?>
			<?php if(!empty($errors)):?>
					<?php foreach($formErrors as $error):?>
						<div class='error'>
							<li><?= $error ;?>
					<?php endforeach;?>
					</div>
			<?php endif;?> 

	</body>
	<?php
	if(isset($_GET['erreur'])){
		$err = $_GET['erreur'];
		if($err==1){
			echo "<p style='color:red'>Erreur lors de l'envoi du mail</p>";
		}
		else{
			echo "<p style='color:red'>Ce mail n'existe pas dans la base de données</p>";
		}
			
	}
	?>
</html>