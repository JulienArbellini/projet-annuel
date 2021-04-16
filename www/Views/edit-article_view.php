<?php
    // session_start();
?>

<div class="row col-m-12 col-m-up-2">
	<div class="col-m-3">
		<img src="../../framework/img/fleche_retour.png" alt="flèche retour" width="12px" height="12px"/>
        <a href="/articles" class="link">Retour à la page précédente</a>
	</div>
	<div class="col-m-3 col-m-center">
        <?php
            $html = "<h1>".$_GET['title']."</h1>";
            echo $html;

        ?>
    </div>
        <div class="col-m-12 col-m-up-5 col-m-center">
            <textarea class="ckeditor" id="contenu"><?php echo $_GET['content'];//echo $_GET['content'];//echo $_SESSION['content']; ?></textarea>
        </div>  

        <?php //var_dump($_SESSION['array_content']);
              //var_dump($_SESSION['array_content']); ?>
        <!-- echo $donnees[4]["content"] -->

        <div class="col-m-2 col-m-center col-m-padding-down-2">
            <!-- <button class="button">Enregistrer</button> -->
            <input type="submit" class="button" value="Enregistrer">
        </div>

</div>

<!-- Utiliser les sessions pour faire passer le contenu dynamiquement ? -->