<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Template de Back</title>
		<meta name="description" content="ceci est la page de template">
		<link rel="stylesheet" href="framework/dist/main.css">
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
		
		<div id="primary-container">
			<div id="nav-left">
      		</div>
			<div id="content">
			
			</div>

		</div>
		


		<!-- intégrer le vue -->
		<?php include $this->view ?>

	</body>
</html>