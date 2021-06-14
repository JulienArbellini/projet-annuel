<?php
    //session_start();
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Template de Front</title>
		<meta name="description" content="ceci est la page de front">
		<link rel="stylesheet" href="framework/dist/main.css">
		<script src="framework/src/js/jquery-3.5.1.min.js"></script>
        <link rel="stylesheet" href="framework/src/js/Trumbowyg-master/dist/ui/trumbowyg.min.css">
		<link rel="stylesheet" href="framework/src/js/Trumbowyg-master/dist/plugins/colors/ui/trumbowyg.colors.min.css">
		<link rel="stylesheet" href="framework/src/js/Trumbowyg-master/dist/plugins/emoji/ui/trumbowyg.emoji.min.css">
		<link rel="stylesheet" href="framework/src/js/Trumbowyg-master/dist/plugins/table/ui/trumbowyg.table.min.css">
        
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
		<!-- <script src="framework/src/js/apparence.js"></script> -->

	</head>
	<body>
		<header>
			<div class="row col-m-12">
					<div id="nav-top-left">
						<div class="logo col-s-3 col-m-2 col-l-2">
							<a href="/tableau-de-bord"><img class="col-s-9 col-m-9" src="../../framework/img/Logo teach'r.svg" width="50" height="60" /></a>
						</div>
						<div class="link-nav-bar col-s-2 col-m-2 col-l-pull-2">
							<a href="<?php echo $_SESSION['slug_accueil'][0]["slug"]; ?>" class="link-top-nav-front"><img src="../../framework/img/home.png" alt="Home button" width="19" height="18" />Mon site</a>
							<!-- Mon site -->
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
			<div id="nav-left" style="width: 40vh;">

				<!-- <div class="wrapper"> -->
					
					<!-- <div class="col-m-12 col-m-down-6 col-m-padding-down-5">
						<div class="col-m-9"><p class="p-accordionMenu">Mise en page</p></div>
						<div class="col-m-2"><img id="fleche-accordion" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></div>
						<div class="separator col-m-10 col-m-down-2"></div>
						<div class="content-accordion">Lorem Ipsum</div>
					</div>

				
					<div class="col-m-12 col-m-down-6">
						<div class="col-m-9"><p class="p-accordionMenu">Mise en page</p></div>
						<div class="col-m-2"><img id="fleche-accordion" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></div>
						<div class="separator col-m-10 col-m-down-2"></div>
					</div>


					<div class="col-m-12 col-m-down-6">
						<div class="col-m-9"><p class="p-accordionMenu">Mise en page</p></div>
						<div class="col-m-2"><img id="fleche-accordion" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></div>
						<div class="separator col-m-10 col-m-down-2"></div>
					</div>

					<div class="col-m-12 col-m-down-6">
						<div class="col-m-9"><p class="p-accordionMenu">Mise en page</p></div>
						<div class="col-m-2"><img id="fleche-accordion" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></div>
						<div class="separator col-m-10 col-m-down-2"></div>
					</div>

				
					<div class="col-m-12 col-m-down-6">
						<div class="col-m-9"><p class="p-accordionMenu">Mise en page</p></div>
						<div class="col-m-2"><img id="fleche-accordion" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></div>
						<div class="separator col-m-10 col-m-down-2"></div>
					</div>


					<div class="col-m-12 col-m-down-6">
						<div class="col-m-9"><p class="p-accordionMenu">Mise en page</p></div>
						<div class="col-m-2"><img id="fleche-accordion" src="../../framework/img/fleche_blanche.png" alt="fleche blanche"></div>
						<div class="separator col-m-10 col-m-down-2"></div>
					</div> -->

					

					<!-- <hr/> -->
				<!-- </div> -->



				<button id="add-link" onclick="addLink()">Ajouter un lien</button>
				<button id="add-button" onclick="addButton()">Ajouter un bouton</button>
				<button id="add-navigation" onclick="addNavigation()">Ajouter un menu</button>
				<button id="add-image" onclick="addImage()">Ajouter une image</button>
				<input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg">
			</div>
			
			<div id="content">
				<?php include $this->view ?>
			</div>
		</main>
	</body>
</html>