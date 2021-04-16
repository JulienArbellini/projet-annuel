<?php
    // session_start();
?>

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
                    <tr><th>Nom Article</th><th>Auteur</th><th>Dernières modifications</th><th>Modifier</th><th>Supprimer</th><th style="display: none;">Contenu</th></tr>
                </thead>
                <tbody>
                    <?php 
                        foreach ($donnees as $key => $value){

                            //$_SESSION['content'] = ($value["content"]);
                            // $_SESSION['array_content'] = array($value["content"]);
                            // var_dump($_SESSION['array_content']);
                            
                            $html = "
                            <tr>
                                <td><a href=\"#\" class=\"link\">".($value["title"])."</a></td><td>".($value["firstname"])."</td>
                                <td>".($value["createdAt"])."</td>
                                <td id=\"content\" style=\"display: none;\">".($value["content"])."</td>
                                <td><a href=\"/articles-edit?title=".($value['title'])."&content=".($value['content'])."\" id=\"pen\" onclick='document.getElementById('content').style.color='red';' class=\"edit\"><img src=\"../../framework/img/pen-edit.svg\" alt=\"pen-edit\" width=\"15\" height=\"15\"></a></td>
                                <td><a href=\"#modal".($value["idArticle"])."\" class=\"js-modal supp\">&#x2717;</a></td>
                            </tr>
                            ";

                            

                            echo $html;


                            //echo $value['content'];

                        }
                        //echo $value["content"];
                    ?>

                </tbody>
            </table>
            
            <?php 
                //var_dump($_SESSION['array_content']);
                foreach ($donnees as $key => $value){
                    $modal = "  <aside id=\"modal".($value["idArticle"])."\" class=\"modal\" aria-hidden=\"true\" role=\"dialog\" aria-labelledby=\"titlemodal\" style=\"display:none;\">
                                    <div class=\"modal-wrapper js-modal-stop\">
                                        <div class=\"container1\">
                                            <h1 id=\"titlemodal\">Voulez-vous vraiment supprimer cet article ?</h1>
                                            <p><strong>Nom de l'article : </strong>".($value['title'])."</p>
                                            <p><strong>Auteur : </strong>".($value['firstname'])."</p>

                                            <div class=\"container2\">
                                                <button class=\"js-modal-close\">Annuler</button>
                                              
                                                <button class=\"\" onclick=\"window.location.href='/articles?id=".($value['idArticle'])."&module=base&action=articles'\">Supprimer</button>
                                              
                                            </div>
                                        </div>
                                    </div>
                                </aside>";

                    echo $modal;
                }
            ?>

            <?php
                //foreach ($donnees as $key => $value){

                    // $_SESSION['array_content'] = array($value["content"]);
                    // var_dump($_SESSION['array_content']);
                    //$_SESSION['content'] = ($value["content"]);

                    //  var_dump($_SESSION['content']) ;
                //}
            ?>
           
            <script type="text/javascript" src="framework/src/js/int-datatables.js"></script>
            <script type="text/javascript" src="framework/src/js/modal.js"></script>
            


            <!-- <script type="text/javascript" src="framework/src/js/Ajax.js"></script> -->

       