<div class="row col-m-12 col-m-up-2">
	<div class="col-m-3">
		<img src="../../framework/img/fleche_retour.png" alt="flèche retour" width="12px" height="12px"/>
        <a href="/articles" class="link">Retour à la page précédente</a>
	</div>
	<div class="col-m-3 col-m-center">
 		<h1>Nouvel article</h1>
    </div>
	<!-- <div class="col-m-3">
        <a href="/articles">Retour à la page précédente</a>
	</div> -->
</div>

<!-- CODE PHP AFFICHAGE DU FORMULAIRE DEPUIS LE FORM BUILDER -->
<?php if(!empty($formErrors)):?>
	<?php foreach($formErrors as $error):?>
		<li><?= $error ;?>
	<?php endforeach;?>
<?php endif;?>


<?php App\Core\AddArticleForm::showFormAddArticle($form); ?>
