<div class="row col-m-12 col-m-up-1">
    <div class="col-m-3 col-m-center">
        <h1 style="text-align: center;">Pages</h1>
    </div>
</div>

<div class="row col-m-12 col-m-up-4">
    
    <div class="col-m-3 col-m-padding-1 col-m-center col-m-pull-3">
        <button class="button-add-page" id="button-add-page" onclick="displayForm()" style="">Ajouter</button>
            <form method="POST" action="">
                <div class="button-form-page-position col-m-center">
                    <label for="add-page-title" id="label" style="display: none;">Nouvelle page :</label>
                    <input type="text" id="add-page-title"  name="add-page-title" placeholder="Titre" style="display: none;">
                    <input type="text" id="add-page-slug"  name="add-page-slug" placeholder="/slug" style="display: none;">

                    <!-- <div class="button-form-page-position"> -->
                        <button type="reset" style="display: none;" class="button-formulaire-page" id="cancel-button" onclick="cancel()">Annuler</button>
                        <button type="submit" id="submit-button" style="display: none;" class="button-formulaire-page" onclick="window.location.href='/pages'">Enregistrer</button>
                </div>
            </form>
    </div>


    <div class="shadow-box-square col-s-10 col-m-10 col-m-center">
        <table id='tab' class='display'>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Créateur</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>
                <?php
                    foreach ($donnees as $key => $value){
                        $html = "
                        <tr>
                            <td>".($value["title"])."</br>
                                <a href=\"/apparence?idPage=".($value["id"])."&module=base&action=apparence\" class=\"link-tab-page\">Modifier</a>
                                <a href=\"".($value["slug"])."\" class=\"link-tab-page\"> | Afficher |</a>
                                <a href=\"#modal".($value["id"])."\" class=\"js-modal link-tab-page\">Supprimer</a>
                            </td>
                            <td>".($value["firstname"])."</td>
                            <td>".($value["createdAt"])."</td>
                        </tr>";

                        echo $html;
                    }
                ?>
            </tbody>
        </table>

        <?php 
                foreach ($donnees as $key => $value){
                    $modal = "  <aside id=\"modal".($value["id"])."\" class=\"modal\" aria-hidden=\"true\" role=\"dialog\" aria-labelledby=\"titlemodal\" style=\"display:none;\">
                                    <div class=\"modal-wrapper js-modal-stop\">
                                        <div class=\"container1\">
                                            <h1 id=\"titlemodal\">Voulez-vous vraiment supprimer cette page ?</h1>
                                            <p><strong>Titre de la page : </strong>".($value['title'])."</p>
                                            <p><strong>Créateur : </strong>".($value['firstname'])."</p>

                                            <div class=\"container2\">
                                                <button class=\"js-modal-close\">Annuler</button>
                                              
                                                <button class=\"\" onclick=\"window.location.href='/pages?id=".($value['id'])."'\">Supprimer</button>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </aside>";

                    echo $modal;
                }
            ?>

    </div>
</div>

<script type="text/javascript" src="framework/src/js/int-datatables.js"></script>
<script type="text/javascript" src="framework/src/js/modal.js"></script>
<script type="text/javascript" src="framework/src/js/addPage.js"></script>
                    