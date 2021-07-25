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
                <!-- <script type="text/javascript" src="dist/main.js"></script> -->
                <script type="text/javascript" src="framework/src/js/ckeditor/ckeditor.js"></script>
                <script type="text/javascript" src="framework/src/js/DataTables/media/js/jquery.js"></script>
                <script type="text/javascript" src="framework/src/js/DataTables/media/js/jquery.dataTables.js"></script>
                <!-- <script type="text/javascript" src="framework/src/js/jquery-3.5.1.min.js"></script> -->
                <link rel="stylesheet" href="framework/src/js/DataTables/media/css/jquery.dataTables.css">
                <!-- <script type="text/javascript" src="framework/src/js/modal.js"></script> -->
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
                                <div class='elem-etape'><a class="link-left-nav config"><?php if(4-$_SESSION['count']>1){echo 4-$_SESSION['count']  . 'étapes restantes'; }else{echo '1 étape restante';} ?></a></div>
                        </div>
                    <div class='hr-style'>
                        <hr class='hr-complete'>
                    </div>
                    <div class="menu container-flexbox-nav dashboard col-s-12 col-m-12 col-l-12 actual-page">
                            <div class="col-m-9"><a href="/tableau-de-bord" class="link-left-nav">Tableau de bord</a></div>
                    </div>
                    <div class='hr-style'>
                        <hr>
                    </div>
                    <div class='left-nav-bar-description'>
                        <div class='text-inside'>Créations</div>
                    </div>
                    <a href="/apparence" class="menu container-flexbox-nav apparence cols-s-12 col-m-12 col-l-12">
                            <div class="col-m-8"><div class="link-left-nav">Apparence</div></div>
                    </a>
                    <a href="/articles" class="menu container-flexbox-nav articles col-s-12 col-m-12 col-l-12">
                            <div class="col-m-8"><div href="/articles" class="link-left-nav">Articles</div></div>
                    </a>
                    <a href="/pages" class="menu container-flexbox-nav pages col-s-12 col-m-12 col-l-12">
                            <div class="col-m-8"><div class="link-left-nav">Pages</div></div>
                    </a>
                    <div class='hr-style'>
                        <hr>
                    </div>
                    <div class='left-nav-bar-description'>
                        <div class='text-inside'>Gestion utilisateurs</div>
                    </div>
                    <a href="/utilisateurs" class="menu container-flexbox-nav utlilisateurs col-s-12 col-m-12 col-l-12">
                            <div class="col-m-8"><div class="link-left-nav">Utilisateurs</div></div>
                    </a>
                    <div class='hr-style'>
                        <hr>
                    </div>
                    <div class='left-nav-bar-description'>
                        <div class='text-inside'>Questions</div>
                    </div>
                    <a href='/faq' class="menu container-flexbox-nav faq col-s-12 col-m-12 col-l-12">
                            <div class="col-m-8"><div class="link-left-nav">FAQ</div></div>
                    </a>
                    
                    <div class="menu container-flexbox-nav parametres col-s-12 col-m-12 col-l-12">
                            <div class="col-m-8"><a href='\tableau-de-bord?deconnexion=true' style="color:red" ><span>Déconnexion</span></a></div>
                    </div>
                </div>
            </div>
			<div id="content" style='margin-left: 220px;'>
				<?php include $this->view ?>
			</div>
		</main>
                
	</body>

</html>