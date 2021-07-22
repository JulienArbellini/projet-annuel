<div class="row col-m-12 col-m-up-2">
    <div class="col-m-3">
        <img src="../../framework/img/fleche_retour.png" alt="flèche retour" width="12px" height="12px"/>
        <a href="/articles" class="link">Retour à la page précédente</a>
    </div>
    <div class="col-m-3 col-m-center">
        <h1 class="titre-affichage-article"><?php echo $data[0]["title"]?></h1>
    </div>
</div>

<div class="row col-m-10 col-m-up-2">
    <div class="affichage-article">
        <?php echo $data[0]["content"]?>
    </div>
</div>

