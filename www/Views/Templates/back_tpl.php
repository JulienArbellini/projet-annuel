<?php
        // session_start();
        if (!($_SESSION['loggedIn'])){
                header('Location:/login');
        } 
        if(isset($_GET['deconnexion']))
        { 
           if($_GET['deconnexion']==true)
           {  
              session_unset();
              header('Location: \login');
           }
        }
?>
   
<!DOCTYPE html>
<html lang="fr">
	<head>
                <meta charset="iso-8859-1">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Template de Back</title>
                <meta name="description" content="ceci est la page de template">
                <link rel="stylesheet" href="framework/dist/main.css">

                <link rel="stylesheet" href="framework/dist/main.css">
		<script src="framework/src/js/jquery-3.5.1.min.js"></script>
		<script src="framework/src/js/node_modules/jquery-resizable-dom/dist/jquery-resizable.min.js"></script>

                <!-- <script type="text/javascript" src="framework/src/js/DataTables/media/js/jquery.js"></script> -->
                <script type="text/javascript" src="framework/src/js/DataTables/media/js/jquery.dataTables.js"></script>
                <link rel="stylesheet" href="framework/src/js/DataTables/media/css/jquery.dataTables.css">
		
                <link rel="stylesheet" href="framework/src/js/Trumbowyg-master/dist/ui/trumbowyg.min.css">
		<link rel="stylesheet" href="framework/src/js/Trumbowyg-master/dist/plugins/colors/ui/trumbowyg.colors.min.css">
		<link rel="stylesheet" href="framework/src/js/Trumbowyg-master/dist/plugins/emoji/ui/trumbowyg.emoji.min.css">
		<link rel="stylesheet" href="framework/src/js/Trumbowyg-master/dist/plugins/table/ui/trumbowyg.table.min.css">
		<link rel="stylesheet" href="framework/dist/site-pages.css">
        
                <script src="framework/src/js/Trumbowyg-master/dist/trumbowyg.min.js"></script>
		<script src="framework/src/js/Trumbowyg-master/dist/plugins/colors/trumbowyg.colors.min.js"></script>
		<script src="framework/src/js/Trumbowyg-master/dist/plugins/emoji/trumbowyg.emoji.min.js"></script>
		<script src="framework/src/js/Trumbowyg-master/dist/plugins/fontfamily/trumbowyg.fontfamily.min.js"></script>
		<script src="framework/src/js/Trumbowyg-master/dist/plugins/fontsize/trumbowyg.fontsize.min.js"></script>
		<script src="framework/src/js/Trumbowyg-master/dist/plugins/history/trumbowyg.history.min.js"></script>
		<script src="framework/src/js/Trumbowyg-master/dist/plugins/indent/trumbowyg.indent.min.js"></script>
		<script src="framework/src/js/Trumbowyg-master/dist/plugins/insertaudio/trumbowyg.insertaudio.min.js"></script>
		<script src="framework/src/js/Trumbowyg-master/dist/plugins/lineheight/trumbowyg.lineheight.min.js"></script>
		<script src="framework/src/js/Trumbowyg-master/dist/plugins/noembed/trumbowyg.noembed.min.js"></script>
		<script src="framework/src/js/Trumbowyg-master/dist/plugins/table/trumbowyg.table.min.js"></script>
		<script src="framework/src/js/Trumbowyg-master/dist/plugins/upload/trumbowyg.upload.min.js"></script>
		<script src="framework/src/js/Trumbowyg-master/dist/plugins/resizimg/trumbowyg.resizimg.min.js"></script>


                
	</head>
	<body style="display:flex; flex-direction:column;">
		
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
                                                <a href="/apparence" class="link-top-nav-front"><img src="../../framework/img/add.png" alt="plus button" width="19" height="18">Créer</a>
                                        </div>
                                        <div id="profile_id" class="link-nav-bar col-s-2 col-m-2 col-l-1">
                                        <?php echo 'Bonjour ' .$_SESSION['prenom']. '';?>
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
                            <div class="col-m-8"><a  class="link-left-nav" href="/FAQ">FAQ</a></div>
                            <div class="col-m-2"><img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img></div>
                    </div>
                    <div class="menu container-flexbox-nav parametres col-s-12 col-m-12 col-l-12">
                            <div class="col-m-2"><img src="../../framework/img/parametre.png" alt="logo parametres" ></div>
                            <div class="col-m-8"><a class="link-left-nav" href="#">Paramètres</a></div>
                            <div class="col-m-2"><img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img></div>
                    </div>
                    <div class="menu container-flexbox-nav parametres col-s-12 col-m-12 col-l-12">
                            <div class="col-m-8"><a href="/logout?deconnexion=true&id=<?php echo $_SESSION['id'][0]['id'];?>" style="color:red" ><span>Déconnexion</span></a></div>
                            <?php //echo $_SESSION['id'][0]['id'] ?>
                    </div>
                </div>
            </div>
			<div id="content">
				<?php include $this->view ?>
			</div>
		</main>
                
	</body>

</html>