
    <div class="row col-m-12 col-m-up-2">
        <div class="col-m-3">
            <img src="../../framework/img/fleche_retour.png" alt="flèche retour" width="12px" height="12px"/>
            <a href="/articles" class="link">Retour à la page précédente</a>
        </div>
        <div class="col-m-3 col-m-center">
            <h1>Modifier un article</h1>
        </div>
    </div>
    <div class="row col-m-10 col-m-up-3">
        <form method="post" class="update_form">
            <div class="col-m-12 col-m-padding-1 col-m-center">
                <input type="text" class="form__field" name="titre_article" value="<?php echo $data[0]["title"]?>">
            </div>

            <div class="col-m-12 col-m-up-5 col-m-center">
                    <textarea class="ckeditor" id="contenu_article" name="contenu_article"><?php echo $data[0]["content"];?></textarea>
            </div>  

            <div class="col-m-2 col-m-center col-m-padding-down-2">
                <!-- <button class="button">Enregistrer</button> -->
                <input type="submit" class="button" value="Enregistrer" onclick="alert('Vos modifications ont bien été enregistrées !')">
            </div>
        </form>
    </div>
