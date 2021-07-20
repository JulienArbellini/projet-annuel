<div class="row col-m-12 col-m-down-3">
    <div class="col-s-10 col-m-12 col-m-center">
        <form method="post">
                <div class="col-m-12 col-m-padding-2 col-m-center header-apparence">
                    <input type="text" class="form__field" name="titre_page" placeholder="titre" value="<?php echo $data[0]["title"] ?>">
                    <input type="text" class="form__field" name="slugPage" placeholder="/slug" value="<?php echo $data[0]["slug"] ?>">
                    <label for="pageAccueil" class="label-apparence">Page d'accueil
                    <input type="checkbox" id="pageAccueil" class="checkbox-apparence" name="pageAccueil[]" value="Accueil" <?php if ($_SESSION['checkbox_state'][0][0] == 1) echo "checked"?> ></label>
                    <a href="<?php echo $data[0]["slug"]?>" class="link-apparence">Visualiser la page</a>
                </div>
    
                <textarea id="trumbowyg" name="affichage-page"><div id="wysiwyg"><?php echo $data[0]["content"] ?></div></textarea>
                <input type="hidden" name="id_user_page" value="<?php echo $_SESSION['idUserConnected'][0]["id"]?>">
        
            <div class="col-m-2 col-m-push-5 col-m-down-2">
                <input type="submit" value="Enregistrer" class="button-apparence">
            </div>
        </form>

    </div>

    <script type="text/javascript" src="framework/src/js/trumbowyg-call.js"></script>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.0.min.js"><\/script>')</script>
<script src="framework/src/js/apparence.js"></script>

