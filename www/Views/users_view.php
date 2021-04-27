<h1>Utilisateurs</h1>
<a href="#modal-add" class="js-modal"><img src="../framework/img/add-user.png" alt="add-user" width="15" height="15"/>Inviter un utilisateur</a>
<div class="shadow-box-square col-m-11">
    <table id='tab' class="display">
        <thead>
            <tr><th>Identifiant</th><th>Nom</th><th>Prénom</th><th>Adresse email</th><th>Rôle</th><th>Dernière connexion</th><th>Modifier</th><th>Supprimer</th></tr>
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
                            <td><a href=\"#modal-edit".($value['idUser'])."\" class=\"js-modal update\">&#9998</a></th>
                            <td><a href=\"#modal".($value['idUser'])."\" class=\"js-modal supp\">&#x2717</a></td>
                        </tr> ";

                echo $html;    
            }
        ?>
        <!-- onclick=\"window.location.href='/utilisateurs?idUser=".($value['idUser'])."'\" -->
        </tbody>
    </table>
</div>

<?php foreach($donnees as $key => $value)
    { ?>
        <aside id="modal<?= $value['idUser']?>" class="modal" aria-hidden="true" role="dialog" aria-labelledby="title-modal-delete" style="display:none;">
            <div class="modal-wrapper js-modal-stop">
                <div class="container1">
                    <h1 id="title-modal-delete">Êtes-vous sûr de vouloir supprimer cet utilisateur ?</h1>
                    <p><strong>Identifiant : </strong><?= $value['pseudo']; ?><p>
                    <p><strong>Adresse email : </strong><?= $value['email']; ?><p>
                    <p><strong>Rôle : </strong><?= $value['status']; ?><p>
                    <div class="container2">
                        <button class="js-modal-close">Annuler</button>
                        <button class="js-modal-stop" value="<?= $value['idUser']; ?>" onclick="window.location.href='/utilisateurs?idUser=<?= $value['idUser']; ?>&module=base&action=users'">Supprimer</button>
                    </div>
                </div>
            </div>
        </aside>  


        <aside id="modal-edit<?= $value['idUser']?>" class="modal" aria-hidden="true" role="dialog" aria-labelledby="title-modal-edit" style="display:none;">
            <div class="modal-wrapper js-modal-stop title-modal">
                <div class="container1">
                <h1 id="title-modal-edit">Modifier l'utilisateur</h1>
                
                <?php if(!empty($formErrors)):?>
                    <?php foreach($formErrors as $error):?>
                        <li><?= $error ;?>
                    <?php endforeach;?>
                <?php endif;?>

                <?php App\Core\Form::showUpdateForm($updateForm, $donnees); ?>
                </div>
            </div>
        </aside>      
<?php        
    }
?>


<aside id="modal-add" class="modal" aria-hidden="true" role="dialog" aria-labelledby="title-modal-add" style="display:none;">
    <div class="modal-wrapper js-modal-stop title-modal">
        <div class="container1">
            <h1 id="title-modal-add">Inviter un utilisateur</h1>
            
            <?php if(!empty($formErrors)):?>
                <?php foreach($formErrors as $error):?>
                    <li><?= $error ;?>
                <?php endforeach;?>
            <?php endif;?>

            <?php App\Core\Form::showForm($form, $data); ?>
            <!-- <div class="container2">
                <button class="js-modal-close">Annuler</button>
                <button class="js-modal-stop" value="submit">Enregistrer</button>
            </div> -->
        </div>
    </div>
</aside>   



<script src="../framework/src/js/int-datatables.js"></script>
<script src="../framework/src/js/modal.js"></script>
<script src="../framework/src/js/users.js"></script>