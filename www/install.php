<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Installeur</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
		<link rel="stylesheet" href="./framework/dist/main.css">
	</head>
	<body>
        <div class=container>
			<div class="logo col-l-3">
				<img class="col-m-center" src="../../framework/img/Logo teach'r.svg">
			</div> 
            <p class="title-install">Base de données</p>
        </div>
        <form class="shadow-box-square col-m-8 col-l-4 col-m-center" action="traitement.php" method="POST">
            <input type="hidden" name="etape" value="1" />
            <div class="form-group">
                <label class="control-label" for="bdd-name">Nom de la base de données</label>
                <input class="input" id="bdd-name" name="bdd-name" type="text">
            </div>
            <div class="form-group">
                <label class="control-label" for="bdd-user-name">Nom d'utilisateur</label>
                <input class="input" id="bdd-user-name" name="bdd-user-name" type="text">
            </div>
            <div class="form-group">
                <label class="control-label" for="bdd-user-pwd">Mot de passe</label>
                <input class="input" id="bdd-user-pwd" name="bdd-user-pwd" type="text">
            </div>
            <div class="form-group">
                <label class="control-label" for="bdd-host">Hôte</label>
                <input class="input" id="bdd-host" name="bdd-host" type="text">
            </div>
            <!-- <div class="form-group">
                <label class="control-label" for="bdd-prefix">Préfixe</label>
                <input class="input" id="bdd-prefix" name="bdd-prefix" type="text">
            </div> -->
            <div class="form-group sgbd">
                <p>Attention ! Le SGBD utilisé doit être MySQL.</p>
            </div>
            <!-- <input type="submit" name="submit" value="Envoyer" /> -->
            <button type="submit" class="button" id="btn_register" value="Envoyer">Installation</button>
        </form>
    </body>



            <!-- <button type="submit" class="button" id="btn_register">Se connecter</button> -->