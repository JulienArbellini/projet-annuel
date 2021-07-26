<div class="row col-m-12 col-m-up-2">
        <div class="col-m-3 col-m-center">
            <h1 class="h1-article">Articles</h1>
        </div>
</div>

<div class="row col-m-12 col-m-up-4">
    <!-- <div class="add-article-search col-s-10 col-m-8 col-m-center"> -->
    
        <!-- <div class="row col-m-10 col-m-up-3"> -->
            <div class="col-m-3 col-m-padding-1 col-m-center col-m-pull-3">
            <?php if($notSpectateur) { ?><a href="/articles-add" class="link-add-article"><p>+ Ajouter un article</p></a><?php } ?>
            </div>
        <!-- </div> -->
    <!-- </div> -->

    

    <div class="shadow-box-square col-s-10 col-m-10 col-m-center">

            <table id='tab' class='display'>
                <!-- <caption>Articles</caption> -->
                <thead>
                    <tr><th>Nom Article</th><th>Auteur</th><th>Dernières modifications</th><th>Modifier</th><th>Supprimer</th><th style="display: none;">Contenu</th></tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($donnees as $key => $value){ ?>
                            <tr>
                                <td><a href="<?= $value["slug"] ?>" class="link"><?= $value["title"] ?></a></td><td><?= $value["firstname"] ?></td>
                                <td><?= $value["createdAt"] ?></td>
                                <td><?php if($notSpectateur) { ?><a href="/articles-edit?&idArticle=<?= $value['id']?>&module=base&action=editArticle" id="pen" class="edit"><img src="../../framework/img/pen-edit.svg" alt="pen-edit" width="15" height="15"></a><?php } else { ?>&#128274<?php } ?></td>
                                <td><?php if($notSpectateur) { ?><a href="#modal<?= $value["id"]?>" class="js-modal supp">&#x2717</a><?php } else { ?>&#128274<?php } ?></td>
                            </tr>

                    <?php 
                       }
                    ?>
                    <!-- /display-articles?idArticle=".($value["id"])." -->
                </tbody>
            </table>
            
            <?php 
                foreach ($donnees as $key => $value){
                    $modal = "  <aside id=\"modal".($value["id"])."\" class=\"modal\" aria-hidden=\"true\" role=\"dialog\" aria-labelledby=\"titlemodal\" style=\"display:none;\">
                                    <div class=\"modal-wrapper js-modal-stop\">
                                        <div class=\"container1\">
                                            <h1 id=\"titlemodal\">Voulez-vous vraiment supprimer cet article ?</h1>
                                            <p><strong>Nom de l'article : </strong>".($value['title'])."</p>
                                            <p><strong>Auteur : </strong>".($value['firstname'])."</p>

                                            <div class=\"container2\">
                                                <button class=\"js-modal-close\">Annuler</button>
                                              
                                                <button class=\"\" onclick=\"window.location.href='/articles?id=".($value['id'])."'\">Supprimer</button>
                                              
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
            
            

            <!-- <script type="text/javascript" src="framework/src/js/Ajax.js"></script> -->

       