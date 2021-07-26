
    <div class="row col-m-12 col-m-up-1 col-m-down-5">
        <div class="col-m-3">
            <img src="../../framework/img/fleche_retour.png" alt="flèche retour" width="12px" height="12px"/>
            <a href="/articles" class="link">Retour à la page précédente</a>
        </div>
        <div class="col-m-3 col-m-center">
            <p class="titre-article">Modifier un article</p>
        </div>
    </div>

    <div class="row col-m-12 col-m-up-1">
        <form method="post" class="update_form">
            <div class="col-m-7 col-m-padding-1 col-m-center form__field_articles_input">
                <div class="col-m-12 col-m-center form__field_articles_input">
                    <input type="text" class="form__field" name="titre_article" value="<?php echo $data[0]["title"]?>">
                </div>   
                <div class="col-m-12 col-m-center form__field_articles_input">   
                    <input type="text" class="form__field" name="slug_article" value="<?php echo $data[0]["slug"]?>">
                </div>
            </div>

            <div class="col-m-12 col-m-up-5 col-m-center">
                    <textarea id="trumbowyg" id="contenu_article" name="contenu_article"><?php echo $data[0]["content"];?></textarea>
            </div>  

            <input type="hidden" name="idConnectedUser" value="<?php echo $_SESSION['idUserConnected'][0]["id"]?>">

            <div class="col-m-2 col-m-center">
                <input type="submit" class="button-apparence" value="Enregistrer" onclick="alert('Vos modifications ont bien été enregistrées !')">
            </div>
        </form>

        <div class="col-m-12 col-m-center form__field_articles_input">
            <form method="post" class="update_form">
                <div class="flex-category-form">
                    <label for="select-category">Catégories</label>
                    <select name="categories" id="select-category">
                        <option>Choisir une catégorie</option>
                        <?php foreach($list_category as $key => $value){?>
                                <option value="<?php echo $value["id"] ?>"><?php echo $value['category_name'] ?></option>
                        <?php       
                            }
                        ?>
                    </select>
                    
                    <input type="submit" value="Appliquer" class="button-formulaire-page"/>
                </div>
            </form>
        </div>
    </div>

<script type="text/javascript" src="framework/src/js/trumbowyg-call.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.0.min.js"><\/script>')</script>