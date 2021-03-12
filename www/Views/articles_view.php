<div class="row col-m-12">
    <div class="add-article-search col-s-10 col-m-8 col-m-center">
        <h1>Articles</h1>
        <a href="#" class="col-s-10 col-m-2 col-m-push-3 col-m-down-3">
            <a href="/articles-add"><p>+ Ajouter un article</p></a>
        </a>

        <div class="search-box">
            <input type="text" placeholder="Rechercher un article">
        </div>
    </div>

    <div class="shadow-box-square col-s-10 col-m-10 col-m-center">

         <div class="name-column">
            <div class="col-m-3 col-m-push-1"><p><strong>Nom article</strong></p></div>
            <div class="col-m-3 col-m-push-1"><p><strong>Dernières modifications</strong></p></div>
            <div class="col-m-3 col-m-push-1"><p><strong>Auteur</strong></p></div>
        </div>

            <?php
                foreach($donnees as $key => $value){
                    $html = "<div class=\"container-flexbox\">
                                <a href=\"#\" class=\"link\">".($value["title"])."</a>
                                <p>".($value["createdAt"])."</p>
                                <p>".($value["firstname"])."</p>
                                <a href=\"#\"><img src=\"../../framework/img/pen-edit.svg\" alt=\"pen-edit\" width=\"15\" height=\"15\"></a>
                                <a href=\"#\"><img src=\"../../framework/img/cross-delete.svg\" alt=\"cross-delete\" width=\"15\" height=\"15\"></a>
                            </div>
                            <div class=\"separator\"></div>";

                    echo $html;
                }
            ?>

        <!-- <div class="name-column">
            <div class="col-m-3 col-m-push-1"><p><strong>Nom article</strong></p></div>
            <div class="col-m-3 col-m-push-1"><p><strong>Dernières modifications</strong></p></div>
            <div class="col-m-3 col-m-push-1"><p><strong>Auteur</strong></p></div>
        </div>

        <div class="separator"></div>

        <div class="container-flexbox">
            <a href="#" class="link"><?php// echo $donnees['0']['title'];?></a>
            <p><?php// echo $donnees['0']['createdAt'];?></p>
            <p>John Doe</p>
            <a href="#"><img src="../../framework/img/pen-edit.svg" alt="pen-edit" width="15" height="15"></a>
            <a href="#"><img src="../../framework/img/cross-delete.svg" alt="cross-delete" width="15" height="15"></a>
        </div>

        <div class="separator"></div>

        <div class="container-flexbox">
            <a href="#" class="link"><?php //echo $donnees['1']['title'];?></a>
            <p><?php //echo $donnees['1']['createdAt'];?></p>
            <p>John Doe</p>
            <a href="#"><img src="../../framework/img/pen-edit.svg" alt="pen-edit" width="15" height="15"></a>
            <a href="#"><img src="../../framework/img/cross-delete.svg" alt="cross-delete" width="15" height="15"></a>
        </div>

        <div class="separator"></div>

        <div class="container-flexbox">
            <a href="#" class="link"><?php //echo $donnees['2']['title'];?></a>
            <p><?php// echo $donnees['2']['createdAt'];?></p>
            <p>John Doe</p>
            <a href="#"><img src="../../framework/img/pen-edit.svg" alt="pen-edit" width="15" height="15"></a>
            <a href="#"><img src="../../framework/img/cross-delete.svg" alt="cross-delete" width="15" height="15"></a>
        </div>

        <div class="separator"></div>

        <div class="container-flexbox">
            <a href="#" class="link"><?php //echo $donnees['3']['title'];?></a>
            <p><?php //echo $donnees['3']['createdAt'];?></p>
            <p>John Doe</p>
            <a href="#"><img src="../../framework/img/pen-edit.svg" alt="pen-edit" width="15" height="15"></a>
            <a href="#"><img src="../../framework/img/cross-delete.svg" alt="cross-delete" width="15" height="15"></a>
        </div> -->

    
    </div>

</div>

<?php
    // foreach($donnees as $key => $value){
    //     $html = "<div class=\"container-flexbox\">
    //                 <a href=\"#\" class=\"link\">".($value["title"])."</a>
    //                 <p>".($value["createdAt"])."</p>
    //                 <p>John Doe</p>
    //                 <a href=\"#\"><img src=\"../../framework/img/pen-edit.svg\" alt=\"pen-edit\" width=\"15\" height=\"15\"></a>
    //                 <a href=\"#\"><img src=\"../../framework/img/cross-delete.svg\" alt=\"cross-delete\" width=\"15\" height=\"15\"></a>
    //             </div>
    //             <div class=\"separator\"></div>";

    //     echo $html;
    // }
?>
