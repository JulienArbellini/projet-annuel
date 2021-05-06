<h2>Se connecter</h2>
<?php 



?>
<?php if(!empty($formErrors)):?>
	<?php foreach($formErrors as $error):?>
		<li><?= $error ;?>
	<?php endforeach;?>
<?php endif;?>

<?php  App\Core\Form::showFormLogin($form); ?>

<!-- DBHOST=database
DBNAME=teachr
DBUSER=root
DBPWD=password -->