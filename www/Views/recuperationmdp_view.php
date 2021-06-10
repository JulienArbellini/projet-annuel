<!DOCTYPE html>
<html lang="fr">
	<body>
		<div class=container>
			<div class="logo col-l-2">
				<img class="imagelogo" src="../../framework/img/Logo teach'r.svg">
			</div> 
			<?php if(!empty($formErrors)):?>
				<?php foreach($formErrors as $error):?>
					<div class='error'>
						<li><?= $error ;?>
				<?php endforeach;?>
				</div>
			<?php endif;?>  
<?php  App\Core\Form::showFormRecuperation($form);?>
	</body>
</html>