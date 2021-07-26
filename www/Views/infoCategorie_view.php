<div class="row col-m-12 col-m-up-2">
        <div class="col-m-3 col-m-center">
            <form method="post">
                <div class="button-form-page-position col-m-center">
                    <input type="text" class="form__field" name="titre-categorie" value="<?php echo $titleCategorie[0]["category_name"]?>" <?php if($titleCategorie[0]["category_name"] == "Non catégorisé"){echo "disabled";} ?>/>

                    <input type="submit" class="button-apparence" value="Enregistrer">
                </div>
            </form>
        </div>
</div>

<div class="row col-m-12 col-m-up-4">
    <div class="shadow-box-square col-s-10 col-m-10 col-m-center">

        <table id='tab' class='display'>
            <thead>
                <tr><th>Articles dans cette catégorie</th></tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($list_articles as $key => $value){ ?>
                        <tr>
                            <td><?php echo $value["title"] ?></td>
                        </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript" src="framework/src/js/int-datatables.js"></script>