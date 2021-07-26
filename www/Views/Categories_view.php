<div class="row col-m-12 col-m-up-2">
        <div class="col-m-3 col-m-center">
            <h1 class="h1-article">Catégories</h1>
        </div>
</div>

<div class="row col-m-12 col-m-up-4">
    <?php if($notSpectateur) { ?>
            <div class="col-m-3 col-m-padding-1 col-m-center col-m-pull-3">
                <button class="button-add-page" id="button-add-category" onclick="displayForm()" style="">Ajouter</button>
                    <form method="POST" action="">
                        <div class="button-form-page-position col-m-center">
                            <label for="add-page-title" id="label" style="display: none;">Nouvelle catégorie:</label>
                            <input type="text" id="add-category-title"  name="add-category" placeholder="Titre" style="display: none;">
                            <!-- <input type="hidden" name="id_user_page" value="<?php //echo $_SESSION['idUserConnected'][0]["id"]?>"> -->

                            <!-- <div class="button-form-page-position"> -->
                                <button type="reset" style="display: none;" class="button-formulaire-page" id="cancel-button" onclick="cancel()">Annuler</button>
                                <button type="submit" id="submit-button" style="display: none;" class="button-formulaire-page" onclick="document.location.reload()">Enregistrer</button>
                        </div>
                    </form>
            </div>
        <?php 
            } 
        ?>

    

    <div class="shadow-box-square col-s-10 col-m-10 col-m-center">

            <table id='tab' class='display'>
                <!-- <caption>Articles</caption> -->
                <thead>
                    <tr><th>Nom Catégorie</th><th>Modifier</th><th>Supprimer</th></tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($categorie_data as $key => $value){ ?>
                            <tr>
                                <td><?php echo $value["category_name"] ?></td>
                                <td><?php if($notSpectateur) { ?><a href="/edit-categorie?&idCategorie=<?= $value['id']?>" id="pen" class="edit"><img src="../../framework/img/pen-edit.svg" alt="pen-edit" width="15" height="15"></a><?php } else { ?>&#128274<?php } ?></td>
                                <td><?php if($notSpectateur) { ?><a href="#modal<?= $value["id"]?>" class="js-modal supp">&#x2717</a><?php } else { ?>&#128274<?php } ?></td>
                            </tr>

                    <?php 
                       }
                    ?>
                    <!-- /display-articles?idArticle=".($value["id"])." -->
                </tbody>
            </table>
            
            <?php 
                foreach ($categorie_data as $key => $value){
                    $modal = "  <aside id=\"modal".($value["id"])."\" class=\"modal\" aria-hidden=\"true\" role=\"dialog\" aria-labelledby=\"titlemodal\" style=\"display:none;\">
                                    <div class=\"modal-wrapper js-modal-stop\">
                                        <div class=\"container1\">
                                            <h1 id=\"titlemodal\">Voulez-vous vraiment supprimer cette catégorie ?</h1>
                                            <p><strong>Nom de la catégorie : </strong>".($value['category_name'])."</p>

                                            <div class=\"container2\">
                                                <button class=\"js-modal-close\">Annuler</button>
                                              
                                                <button class=\"\" onclick=\"window.location.href='/categories?id=".($value['id'])."'\">Supprimer</button>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </aside>";

                    echo $modal;
                }
            ?>
    </div>
           
<script type="text/javascript" src="framework/src/js/int-datatables.js"></script>
<script type="text/javascript" src="framework/src/js/modal.js"></script>
<script type="text/javascript" src="framework/src/js/addCategory.js"></script>
            
            

            <!-- <script type="text/javascript" src="framework/src/js/Ajax.js"></script> -->

       