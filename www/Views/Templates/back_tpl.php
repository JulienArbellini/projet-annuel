<?php
     // session_start();
     if (file_exists('install.php')){
          header('Location:/install.php');
     }else{
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
     }
?>
   
<!DOCTYPE html>
<html lang="fr">
	<head>
                <meta charset="iso-8859-1">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Teach'r</title>
                <meta name="description" content="Backoffice Teach'r">
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
                                <div id="nav-top">
                                        <div class='nav-top-left'>
                                                <div class="logo col-s-3 col-m-2 col-l-2">
                                                        <a href="/tableau-de-bord"><img class="col-s-9 col-m-9" src="../../framework/img/Logo teach'r.svg" width="50" height="60"></a>
                                                </div>
                                        </div>
                                        
                                        <div class="link-nav-bar col-s-2 col-m-2 col-l-pull-2">
                                                <a href="<?php echo $_SESSION['slug_accueil'][0]["slug"]; ?>" class="link-top-nav-front"><img src="../../framework/img/home.png" alt="Home button" width="19" height="18" />Mon site</a>
                                        </div>
                                        <div class="link-nav-bar col-m-2 col-l-pull-4">
                                                <?php if(isset($_SESSION['notSpectateur'][0]['Role_idRole']) == 1 || isset($_SESSION['notSpectateur'][0]['Role_idRole']) == 2) { ?>
                                                        <a href="/apparence" class="link-top-nav-front"><img src="../../framework/img/add.png" alt="plus button" width="19" height="18">Créer</a>
                                                <?php } ?>
                                        </div>
                                        <a href="profil" class="link-nav-bar col-s-2 col-m-2 col-l-1" style="cursor: pointer;">
                                                <?php echo $_SESSION['pseudo'];?>
                                                <?php if(file_exists($_SESSION['avatar']) && isset($_SESSION['avatar'])) {
                                                        ?>
                                                        <img src="<?= "../".$_SESSION['avatar'];?>" width="35" style='margin-left: 10px;'/>
                                                        <?php    
                                                        }else {
                                                        ?>
                                                        <img src="../public/img/default-avatar.jpg" width="35" style='margin-left: 10px;'/>
                                                        <?php
                                                        }
                                                        ?>
                                        </a>
                                </div>
                        </div>
		</header>
		
		<main>
            <div id="nav-left">
                <div id="liste">
                        <div class="indic-etape">
                                <div class='elem-etape'><a class="link-left-nav config">Configurez votre site</a></div>
                                <div id="avancement">
                                        <div class="progress">
                                                <style>
                                                        @keyframes load {
                                                                0% { width: 0; }
                                                                100% { width: <?php echo $_SESSION['count']*100/4 .'%'; ?>; }
                                                        }
                                                        </style>
                                                <div class="progress-value" ></div>    
                                        </div>
                                </div>
                                <div class='elem-etape'><a class="link-left-nav config"><?php if(4-$_SESSION['count']>1){echo 4-$_SESSION['count']  . ' étapes restantes'; }elseif(4-$_SESSION['count']==1){echo '1 étape restante';}else{echo '0 étape restante';} ?></a></div>
                        </div>
                    <div class='hr-style'>
                        <hr class='hr-complete'>
                    </div>
                    <div class="menu container-flexbox-nav dashboard col-s-12 col-m-12 col-l-12 <?php if($_SESSION["uri"]=='/tableau-de-bord'){echo 'actual-page';}?>">
                            <div class="col-m-9"><a href="/tableau-de-bord" class="link-left-nav">Tableau de bord</a></div>
                    </div>
                    <div class='hr-style'>
                        <hr>
                    </div>
                    <div class='left-nav-bar-description'>
                        <div class='text-inside'>Créations</div>
                    </div>

                    <?php if(isset($_SESSION['notSpectateur'][0]['Role_idRole']) == 1 || isset($_SESSION['notSpectateur'][0]['Role_idRole']) == 2) { ?>
                    <a href="/apparence" class="menu container-flexbox-nav apparence cols-s-12 col-m-12 col-l-12 ">
                            <div class="col-m-8"><div class="link-left-nav">Apparence</div></div>
                    </a>
                    <?php } ?>
                    <a href="/articles" class="menu container-flexbox-nav articles col-s-12 col-m-12 col-l-12 <?php if($_SESSION["uri"]=='/articles'|| $_SESSION["uri"]=='/articles-add' || $_SESSION["uri"]=='/articles-edit'){echo 'actual-page';}?>">
                            <div class="col-m-8"><div href="/articles" class="link-left-nav">Articles</div></div>
                    </a>
                    <a href="/categories" class="menu container-flexbox-nav articles col-s-12 col-m-12 col-l-12 <?php if($_SESSION["uri"]=='/categories'){echo 'actual-page';}?>">
                            <div class="col-m-8"><div href="/categories" class="link-left-nav">Catégories</div></div>
                    </a>
                    <a href="/pages" class="menu container-flexbox-nav pages col-s-12 col-m-12 col-l-12 <?php if($_SESSION["uri"]=='/pages'){echo 'actual-page';}?>">
                            <div class="col-m-8"><div class="link-left-nav">Pages</div></div>
                    </a>
                    <div class='hr-style'>
                        <hr>
                    </div>
                    <div class='left-nav-bar-description'>
                        <div class='text-inside'>Gestion utilisateurs</div>
                    </div>
                    <a href="/utilisateurs" class="menu container-flexbox-nav utlilisateurs col-s-12 col-m-12 col-l-12 <?php if($_SESSION["uri"]=='/utilisateurs'){echo 'actual-page';}?>">
                            <div class="col-m-8"><div class="link-left-nav">Utilisateurs</div></div>
                    </a>
                    <div class='hr-style'>
                        <hr>
                    </div>
                    <div class='left-nav-bar-description'>
                        <div class='text-inside'>Questions</div>
                    </div>
                    <a href='/FAQ' class="menu container-flexbox-nav faq col-s-12 col-m-12 col-l-12 <?php if($_SESSION["uri"]=='/FAQ'){echo 'actual-page';}?>">
                            <div class="col-m-8"><div class="link-left-nav">FAQ</div></div>
                    </a>
                    
                    <div class="menu container-flexbox-nav parametres col-s-12 col-m-12 col-l-12">
                            <div class="col-m-8"><a href='\logout?deconnexion=true&id=<?php echo $_SESSION['id'] ?>' style="color:red; font-size: 13px;" ><span>Déconnexion</span></a></div>
                    </div>
                </div>
            </div>
			<div id="content" style='margin-left: 220px;'>
				<?php include $this->view ?>
			</div>
		</main>
                
	</body>

</html>