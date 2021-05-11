<div class="row col-m-12 col-m-down-3">
    <!-- <div class="affichage-page">
                  
        <h1>Affichage contenu page</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur condimentum dictum auctor. Sed nec ipsum eget neque lacinia efficitur vitae sed metus. Donec felis justo, congue eget lacus et, rhoncus vulputate purus. Maecenas iaculis facilisis augue eget cursus. Nunc cursus interdum feugiat. Sed nec odio eget nulla placerat scelerisque nec sed lacus. Nullam sollicitudin elit eu velit euismod, nec accumsan enim pretium. Duis sit amet commodo augue, id interdum felis. Sed sit amet arcu suscipit dui consequat porttitor et sed eros. In condimentum vestibulum sem, commodo congue tortor. Vivamus tincidunt cursus libero, sit amet tincidunt enim faucibus id. Fusce maximus ex eget odio interdum efficitur. Sed pulvinar ornare varius. Nunc a laoreet ipsum. Morbi eu nisi vulputate, 
        dignissim nibh id, rhoncus nulla. Maecenas vitae auctor ex, sit amet commodo erat.</p>
        <img src="../framework/img/Logo teach'r.svg"></img>
    </div> -->
    <div class="col-s-10 col-m-12 col-m-center">
        <form method="post">
                <div class="col-m-12 col-m-padding-2 col-m-center">
                    <input type="text" class="form__field" name="titre_page" placeholder="titre" value="<?php echo $data[0]["title"] ?>">
                </div>
                <!-- <div class="col-s-10 col-m-12 col-m-center"> -->
                <textarea id="test" name="affichage-page"><?php echo $data[0]["content"] ?></textarea>
                <!-- </div> -->
            <div class="col-m-2 col-m-push-5 col-m-down-2">
                <input type="submit" value="Enregistrer" class="button-apparence">
            </div>
        </form>
    </div>
    <script>
            $('#test').trumbowyg();  
    </script>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>