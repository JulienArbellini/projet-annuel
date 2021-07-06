<?php
    // session_start();
?>

<div class="row col-m-12 col-m-down-3">
    <!-- <div class="affichage-page">
                  
        <h1>Affichage contenu page</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur condimentum dictum auctor. Sed nec ipsum eget neque lacinia efficitur vitae sed metus. Donec felis justo, congue eget lacus et, rhoncus vulputate purus. Maecenas iaculis facilisis augue eget cursus. Nunc cursus interdum feugiat. Sed nec odio eget nulla placerat scelerisque nec sed lacus. Nullam sollicitudin elit eu velit euismod, nec accumsan enim pretium. Duis sit amet commodo augue, id interdum felis. Sed sit amet arcu suscipit dui consequat porttitor et sed eros. In condimentum vestibulum sem, commodo congue tortor. Vivamus tincidunt cursus libero, sit amet tincidunt enim faucibus id. Fusce maximus ex eget odio interdum efficitur. Sed pulvinar ornare varius. Nunc a laoreet ipsum. Morbi eu nisi vulputate, 
        dignissim nibh id, rhoncus nulla. Maecenas vitae auctor ex, sit amet commodo erat.</p>
        <img src="../framework/img/Logo teach'r.svg"></img>
    </div> -->
    <div class="col-s-10 col-m-12 col-m-center">
        <form method="post">
                <div class="col-m-12 col-m-padding-2 col-m-center header-apparence">
                    <input type="text" class="form__field" name="titre_page" placeholder="titre" value="<?php echo $data[0]["title"] ?>">
                    <input type="text" class="form__field" name="slugPage" placeholder="/slug" value="<?php echo $data[0]["slug"] ?>">
                    <label for="pageAccueil" class="label-apparence">Page d'accueil
                    <input type="checkbox" id="pageAccueil" class="checkbox-apparence" name="pageAccueil[]" value="Accueil" <?php if ($_SESSION['checkbox_state'][0][0] == 1) echo "checked"?> ></label>
                    <a href="<?php echo $data[0]["slug"]?>" class="link-apparence">Visualiser la page</a>
                </div>
    
                
                <!-- <div class="col-s-10 col-m-12 col-m-center"> -->
                <textarea id="trumbowyg" name="affichage-page"><div id="wysiwyg"><?php echo $data[0]["content"] ?></div></textarea>
                <!-- </div> -->
            <div class="col-m-2 col-m-push-5 col-m-down-2">
                <input type="submit" value="Enregistrer" class="button-apparence">
            </div>
        </form>

        <!-- <form>
            <input type="checkbox" id="pageAccueil" name="pageAccueil">
            <label for="pageAccueil">Page d'accueil</label>

            <button type="submit" class="button">Définir en tant que page d'accueil</button>
        </form> -->
        
        <!-- <button onclick="insertHeader()">Enregistrer</button> -->
    </div>
    <script>
            $('#trumbowyg').trumbowyg({
                btns: [
                   ['viewHTML', 'formatting', 'strong', 'em', 'del', 'superscript', 'subscript', 'link', 'insertImage', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'unorderedList', 'orderedList', 'horizontaleRule', 'removeformat', 'foreColor', 'backColor', 'emoji', 'fontfamily', 'fontsize', 'historyUndo', 'historyRedo', 'indent', 'outdent', 'insertAudio', 'lineheight', 'table', 'fullscreen']
                ],
                plugins: {
                    resizimg: {
                        minSize: 64,
                        step: 16,
                    }
                }
            });  
    </script>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.0.min.js"><\/script>')</script>
<!-- <script src="framework/src/js/node_modules/jquery-resizable-dom/dist/jquery-resizable.min.js"></script> -->
<!-- <script src="framework/src/js/Trumbowyg-master/dist/plugins/resizimg/trumbowyg.resizimg.min.js"></script> -->
<!-- <script src="framework/src/js/Trumbowyg-master/dist/plugins/upload/trumbowyg.upload.min.js"></script> -->
<script src="framework/src/js/apparence.js"></script>
<!-- <script src="framework/src/js/node_modules/jquery-resizable-dom/dist/jquery-resizable.min.js"></script> -->


<!-- Plusieurs design de menu / lien / possibilité de changer le background -->

<!-- framework/src/js/Trumbowyg-master/dist/plugins/upload/trumbowyg.upload.min.js -->

<!-- POUR L'UPLOAD, TUTO : https://www.youtube.com/watch?v=SfZ0oAiRhCU   //////// https://www.youtube.com/watch?v=JxgulzYe5W0 -->

