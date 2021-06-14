<?php
//     session_start();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
	<meta charset="UTF-8">
	<meta name="vieuxport" content="width=device-width, initial-scale=1.0">
	<title>Template de Back</title>
	<meta name="description" content="ceci est la page de template">
	<link rel="stylesheet" href="framework/dist/main.css">
        <!-- <script type="text/javascript" src="dist/main.js"></script> -->
        <script type="text/javascript" src="framework/src/js/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="framework/src/js/DataTables/media/js/jquery.js"></script>
        <script type="text/javascript" src="framework/src/js/Datatables/media/js/jquery.dataTables.js"></script>
        <!-- <script type="text/javascript" src="framework/src/js/jquery-3.5.1.min.js"></script> -->
        <link rel="stylesheet" type="text/css" href="framework/src/js/Datatables/media/css/jquery.dataTables.css">
        <!-- <script type="text/javascript" src="framework/src/js/modal.js"></script> -->
	</head>
	<body>
		
		<header>
			<div class="row col-m-12">
                <div id="nav-top-left">
                    <div class="logo col-s-3 col-m-2 col-l-2">
                        <a href="/tableau-de-bord"><img class="col-s-9 col-m-9" src="../../framework/img/Logo teach'r.svg" width="50" height="60"></a>
                    </div>
                    <div class="link-nav-bar col-s-2 col-m-2 col-l-pull-2">
                        <a href="<?php echo $_SESSION['slug_accueil'][0]["slug"]; ?>" class="link-top-nav-front"><img src="../../framework/img/home.png" alt="Home button" width="19" height="18" />Mon site</a>
                    </div>
                    <div class="link-nav-bar col-m-2 col-l-pull-4">
                        <img src="../../framework/img/add.png" alt="plus button" width="19" height="18"></img>
                        Créer
                    </div>
                    <div id="profile_id" class="link-nav-bar col-s-2 col-m-2 col-l-1">
                        John Doe
                        <img src="../../framework/img/user.png" alt="user button" width="19" height="18"></img>
                    </div>
                </div>
            </div>
		</header>
		
		<main>
            <div id="nav-left">
                <div id="liste">
                    <div class="menu container-flexbox-nav dashboard col-s-12 col-m-12 col-l-12">
                            <div class="col-m-2"><img src="../../framework/img/dashboard.png" alt="logo dashboard"></div>
                            <div class="col-m-9"><a href="/tableau-de-bord" class="link-left-nav">Tableau de bord</a></div>
                            <div class="col-m-2"><img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img></div>
                    </div>
                    <div class="menu container-flexbox-nav apparence cols-s-12 col-m-12 col-l-12">
                            <div class="col-m-2"><img src="../../framework/img/paint.png" alt="logo apparence"></div>
                            <div class="col-m-8"><a href="/apparence" class="link-left-nav">Apparence</a></div>
                            <div class="col-m-2"><img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img></div>
                    </div>
                    <div class="menu container-flexbox-nav articles col-s-12 col-m-12 col-l-12">
                            <div class="col-m-2"><img src="../../framework/img/articles.png" alt="logo articles"></div>
                            <div class="col-m-8"><a href="/articles" class="link-left-nav">Articles</a></div>
                            <div class="col-m-2"><img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img></div>
                    </div>
                    <div class="menu container-flexbox-nav pages col-s-12 col-m-12 col-l-12">
                            <div class="col-m-2"><img src="../../framework/img/pages.png" alt="logo pages"></div>
                            <div class="col-m-8"><a href="/pages" class="link-left-nav">Pages</a></div>
                            <div class="col-m-2"><img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img></div>
                    </div>
                    <div class="menu container-flexbox-nav commentaires col-s-12 col-m-12 col-l-12">
                            <div class="col-m-2"><img src="../../framework/img/commentaires.png" alt="logo commentaires" ></div>
                            <div class="col-m-8"><p>Commentaires</p></div>
                            <div class="col-m-2"><img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img></div>
                    </div>
                    <div class="menu container-flexbox-nav medias col-s-12 col-m-12 col-l-12">
                            <div class="col-m-2"><img src="../../framework/img/medias.png" alt="logo médias" ></div>
                            <div class="col-m-8"><p>Medias</p></div>
                            <div class="col-m-2"><img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img></div>
                    </div>
                    <div class="menu container-flexbox-nav utlilisateurs col-s-12 col-m-12 col-l-12">
                            <div class="col-m-2"><img src="../../framework/img/utilisateur.png" alt="logo utilisateurs" ></div>
                            <div class="col-m-8"><a href="/utilisateurs" class="link-left-nav">Utilisateurs</a></div>
                            <div class="col-m-2"><img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img></div>
                    </div>
                    <div class="menu container-flexbox-nav faq col-s-12 col-m-12 col-l-12">
                            <div class="col-m-2"><img src="../../framework/img/faq.png" alt="logo FAQ" ></div>
                            <div class="col-m-8"><p>FAQ</p></div>
                            <div class="col-m-2"><img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img></div>
                    </div>
                    <div class="menu container-flexbox-nav parametres col-s-12 col-m-12 col-l-12">
                            <div class="col-m-2"><img src="../../framework/img/parametre.png" alt="logo parametres" ></div>
                            <div class="col-m-8"><p>Paramètres</p></div>
                            <div class="col-m-2"><img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img></div>
                    </div>
                </div>
            </div>
			<div id="content">
				<?php include $this->view ?>
			</div>
		</main>
                
	</body>
</html>