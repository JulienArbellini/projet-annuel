<?php
    if (!($_SESSION['loggedIn'])){
        header('Location:/login');
    }
?>                          
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<title>Profil</title>
		<link rel="stylesheet" href="framework/dist/main.css">
	</head>
	<body style="display:flex; flex-direction:column;">
		
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
                    <a href="profil" class="link-nav-bar col-s-2 col-m-2 col-l-1" style="cursor: pointer;">
                        <?php echo 'Bonjour ' .$_SESSION['prenom']. '';?>
                        <img src="../../framework/img/user.png" alt="user button" width="19" height="18"></img>
                    </a>
                </div>
            </div>
		</header>
		
		<main>
        <div id="nav-left">
                <div id="liste">
                    <div class="menu-profile container-flexbox-nav col-s-12 col-m-12 col-l-12">
                            <div class="col-m-2"><img src="../../framework/img/utilisateur.png" alt="logo utilisateurs" ></div>
                            <div class="col-m-8"><p>Mon profil</p></div>
                            <div class="col-m-2"><img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img></div>
                    </div>
                    <div class="menu-profile container-flexbox-nav dashboard col-s-12 col-m-12 col-l-12">
                            <div class="col-m-2"><img src="../../framework/img/notification.png" alt="logo dashboard"></div>
                            <div class="col-m-9"><p>Notifications</p></div>
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