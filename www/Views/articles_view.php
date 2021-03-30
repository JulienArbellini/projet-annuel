<div class="row col-m-12">
    <div class="add-article-search col-s-10 col-m-8 col-m-center">
        <h1>Articles</h1>
        <a href="#" class="col-s-10 col-m-2 col-m-push-3 col-m-down-3">
            <a href="/articles-add"><p>+ Ajouter un article</p></a>
        </a>
    </div>

    <div class="shadow-box-square col-s-10 col-m-10 col-m-center">

            <table id='tab' class='display'>
                <!-- <caption>Articles</caption> -->
                <thead>
                    <tr><th>Nom Article</th><th>Auteur</th><th>Dernières modifications</th><th>Modifier</th><th>Supprimer</th></tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($donnees as $key => $value){
                            
                            $html = "<tr><td><a href=\"#\" class=\"link\">".($value["title"])."</a></td><td>".($value["firstname"])."</td><td>".($value["createdAt"])."</td>
                            <td><a href=\"\" class=\"edit\"><img src=\"../../framework/img/pen-edit.svg\" alt=\"pen-edit\" width=\"15\" height=\"15\"></a></td>
                            <td><a href=\"/articles?id=".($value['idArticle'])."&module=base&action=articles\" class=\"supp\"><img src=\"../../framework/img/cross-delete.svg\" alt=\"cross-delete\" width=\"15\" height=\"15\"></a></td></tr>";

                            echo $html;

                        }
                    ?>
                    <!--  <td><a href=\"/articles?id=\"".($value['idArticle'])."\" class=\"supp\" data-id=\"".($value["idArticle"])."\"><img src=\"../../framework/img/cross-delete.svg\" alt=\"cross-delete\" width=\"15\" height=\"15\"></a></td></tr>"; -->
                    <!--  <td><a href=\"javascript:void(0);\" class=\"supp\" data-id=\"".($value["idArticle"])."\"><img src=\"../../framework/img/cross-delete.svg\" alt=\"cross-delete\" width=\"15\" height=\"15\"></a></td></tr>"; -->
                </tbody>
            </table>

            <script>
                $(document).ready(function () {
                    $('#tab').DataTable();
                });
            </script>

            <!-- <script type="text/javascript" src="framework/src/js/Ajax.js"></script> -->

       