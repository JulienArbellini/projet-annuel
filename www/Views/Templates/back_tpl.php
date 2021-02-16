<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Template de Back</title>
		<meta name="description" content="ceci est la page de template">
		<link rel="stylesheet" href="framework/dist/main.css">
        <script type="text/javascript" src="dist/main.js"></script>
	</head>
	<body>
		
		<header>
			<div id="nav-top-left">
				<div class="logo">
					<img src="framework/img/Logo teach'r.svg">
				</div>
				<div class="link-nav-bar mon_site">
					<img src="framework/img/home.png" alt="Home button" width="19" height="18"></img>
					Mon site
				</div>
				<div class="link-nav-bar create">
					<img src="framework/img/add.png" alt="plus button" width="19" height="18"></img>
					Créer
				</div>
			</div>
			<div id="nav-top-right">
				<div class="link-nav-bar user">
					John Doe
					<img src="framework/img/user.png" alt="user button" width="19" height="18"></img>
				</div>
			</div>

		</header>
		
		<main>
			<div id="nav-left">
				<div id="liste">
					<div class="menu dashboard">
						<div class="text-img">
							<img src="../../framework/img/dashboard.png" alt="logo dashboard">Tableau de bord</img>
						</div>
						<img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img>
					</div>
					<div class="menu apparence">
						<div class="text-img">
							<img src="../../framework/img/paint.png" alt="logo apparence">Apparence</img>
						</div>
						<img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img>
					</div>
					<div class="menu articles">
						<div class="text-img">
							<img src="../../framework/img/articles.png" alt="logo articles">Articles</img>
						</div>
						<img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img>
					</div>
					<div class="menu pages">
						<div class="text-img">
							<img src="../../framework/img/pages.png" alt="logo pages" >Pages</img>
						</div>
						<img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img>
					</div>
					<div class="menu commentaires">
						<div class="text-img">
							<img src="../../framework/img/commentaires.png" alt="logo commentaires" >Commentaires</img>
						</div>
						<img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img>
					</div>
					<div class="menu medias">
						<div class="text-img">
							<img src="../../framework/img/medias.png" alt="logo médias" >Médias</img>
						</div>
						<img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img>
					</div>
					<div class="menu utlilisateurs">
						<div class="text-img">
							<img src="../../framework/img/utilisateur.png" alt="logo utilisateurs" >Utilisateurs</img>
						</div>
						<img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img>
					</div>
					<div class="menu faq">
						<div class="text-img">
							<img src="../../framework/img/faq.png" alt="logo FAQ" >FAQ</img>
						</div>
						<img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img>
					</div>
					<div class="menu parametres">
						<div class="text-img">
							<img src="../../framework/img/parametre.png" alt="logo parametres" >Paramètres</img>
						</div>
						<img id="fleche" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></img>
					</div>
				</div>
			</div>
			<div id="content">
				<!-- intégrer le vue -->
				<?php include $this->view ?>
			</div>

		</main>
		


		

	</body>
</html>