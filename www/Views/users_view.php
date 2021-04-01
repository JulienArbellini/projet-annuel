<h1>Utilisateurs</h1>
<div class="shadow-box-square col-m-11">
    <table id='tab' class="display">
        <thead>
            <tr><th>Identifiant</th><th>Nom</th><th>Prénom</th><th>Adresse email</th><th>Rôle</th><th>Dernière connexion</th><th>Modifier</th><th>Supprimer</td></tr>
        </thead>
        <tbody>
        <?php
            foreach($donnees as $key => $value){
                $html = "<tr>
                            <td>".($value['pseudo'])."</td>
                            <td>".($value['lastname'])."</td>
                            <td>".($value['firstname'])."</td>
                            <td>".($value['email'])."</td>
                            <td>".($value['status'])."</td>
                            <td>".($value['createdAt'])."</td>
                            <td><a href=\"#\" class=id_".($value['idUser'])."></a><img src=\"../../framework/img/pen-edit.svg\" alt=\"edit\" width=\"15\" height=\"15\"></th>
                            <td><a href=\"#modal".($value['idUser'])."\" class=\"js-modal supp\">&#x2717</a></td>
                        </tr> ";

                echo $html;    
            }
        ?>
        </tbody>
    </table>
</div>

<?php foreach($donnees as $key => $value)
    { ?>
        <aside id="modal<?= $value['idUser']?>" class="modal" aria-hidden="true" role="dialog" aria-labelledby="titlemodal" style="display:none;">
            <div class="modal-wrapper js-modal-stop">
                <h1 id="titlemodal">Êtes-vous sûr de vouloir supprimer cet utilisateur ?</h1>
                <div class="container1">
                    <p><strong>Identifiant : </strong><?= $value['pseudo']; ?><p>
                    <p><strong>Adresse email : </strong><?= $value['email']; ?><p>
                    <p><strong>Rôle : </strong><?= $value['status']; ?><p>
                    <div class="container2">
                        <button class="js-modal-close">Annuler</button>
                        <button class="js-modal-stop">Supprimer</button>
                    </div>
                </div>
            </div>
        </aside>    
<?php        
    }
?>


<script src="../framework/src/js/int-datatables.js"></script>
<script src="../framework/src/js/modal.js"></script>