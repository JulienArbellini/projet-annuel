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



<!-- <form method="post">
		<textarea id="mytextarea" name="mytextarea">
		Hello World ! 
		</textarea>
</form> -->


<!-- <select name="pages" id="select-page">
    <option value="">--Chosissez une page--</option>
    <option value="page_1">Page 1</option>
    <option value="page_2">Page 2</option>
    <option value="page_3">Page 3</option>
</select> -->
