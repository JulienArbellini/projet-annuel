

<?php if(!empty($formErrors)):?>
	<?php foreach($formErrors as $error):?>
		<li><?= $error ;?>
	<?php endforeach;?>
<?php endif;?>
<div class = center-logo>
	<div class="logo col-s-3 col-m-2 col-l-2">
		<img class="col-s-9 col-m-9" src="../../framework/img/Logo teach'r.svg">
	</div>  
</div> 
<div class=container>                 
<?php App\Core\Form::showForm($form); ?>