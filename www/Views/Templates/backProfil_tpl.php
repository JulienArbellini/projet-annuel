<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewxport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<title>Profil</title>
		<link rel="stylesheet" href="framework/dist/main.css">
	</head>
	<body style="display: flex; flex-direction: column;">
		
		<header>
			<div class="row col-m-12">
                <div id="nav-top-left">
                    <div class="logo col-s-3 col-m-2 col-l-2">
                        <img class="col-s-9 col-m-9" src="../../framework/img/Logo teach'r.svg">
                    </div>
                    <div class="link-nav-bar col-s-2 col-m-2 col-l-pull-2">
                        <img src="../../framework/img/home.png" alt="Home button"></img>
                        Mon site
                    </div>
                    <div class="link-nav-bar col-m-2 col-l-pull-4">
                        <img src="../../framework/img/add.png" alt="plus button"></img>
                        Créer
                    </div>
                    <a href="/profil" id="profil_id" class="link-nav-bar col-s-2 col-m-2 col-l-1">
                        John Doe
                        <img src="../../framework/img/user.png" alt="user button"></img>
                    </a>
                </div>
            </div>
		</header>
		
		<main>
            <div id="nav-left">
                <div id="liste">
                    <div class="menu-profil container-flexbox-nav col-s-12 col-m-12 col-l-12">
                            <div class="col-m-2"><img src="../../framework/img/utilisateur.png" alt="logo utilisateurs" ></div>
                            <div class="col-m-8"><p>Mon profil</p></div>
                            <div class="col-m-2"><img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img></div>
                    </div>
                    <div class="menu-profil container-flexbox-nav col-s-12 col-m-12 col-l-12">
                            <div class="col-m-2"><img src="../../framework/img/parametre.png" alt="logo parametres" ></div>
                            <div class="col-m-8"><p>Réglages</p></div>
                            <div class="col-m-2"><img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img></div>
                    </div>
                    <div class="menu-profil container-flexbox-nav col-s-12 col-m-12 col-l-12">
                            <div class="col-m-2"><img src="../../framework/img/notification.png" alt="logo commentaires" ></div>
                            <div class="col-m-8"><p>Notifications</p></div>
                            <div class="col-m-2"><img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img></div>
                    </div>
                    <div class="menu-profil logout container-flexbox-nav col-s-12 col-m-12 col-l-12">
                        <a href="/logout" class="logout-link">Déconnexion</a>
                    </div> 
                </div>
            </div>
			<div id="content">
				<?php include $this->view ?>
			</div>
		</main>
	</body>
</html>