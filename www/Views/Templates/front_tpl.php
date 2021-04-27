<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<title>Template de Front</title>
		<meta name="description" content="ceci est la page de front">
		<link rel="stylesheet" href="framework/dist/main.css">
	</head>
	<body>
		<header>
			<div class="row col-m-12">
					<div id="nav-top-left">
						<div class="logo col-s-3 col-m-2 col-l-2">
							<img class="col-s-9 col-m-9" src="../../framework/img/Logo teach'r.svg" width="50" height="60">
						</div>
						<div class="link-nav-bar col-s-2 col-m-2 col-l-pull-2">
							<img src="../../framework/img/home.png" alt="Home button" width="19" height="18"></img>
							Mon site
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
			<nav role="navigation">
				<div id="menuToggle">
					<input type="checkbox" />

					<span></span>
					<span></span>
					<span></span>

					<ul id="menu">
						<a href="#"><li>Home</li></a>
						<a href="#"><li>About</li></a>
						<a href="#"><li>Info</li></a>
						<a href="#"><li>Contact</li></a>
					</ul>
				</div>
			</nav>
			<!-- <div class="nav-left-front-tpl"> -->
				<!-- <div id="wrap">
					<div class="header">
						<nav class="nav">
							<a href="#wrap" id="open">
								<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="34px" height="27px" viewBox="0 0 34 27" enable-background="new 0 0 34 27" xml:space="preserve">
								<rect fill="#FFFFFF" width="34" height="4"/>
								<rect y="11" fill="#FFFFFF" width="34" height="4"/>
								<rect y="23" fill="#FFFFFF" width="34" height="4"/>
								</svg>
							</a>
							<a href="#" id="close"></a>
							<h1><a href="#">typo-typo</a></h1>
							<a href="#">Helvetica</a>
							<a href="#">Times New Roman</a>
							<a href="#">Garamond</a>
							<a href="#">Didot</a>
							<a href="#">Franklin Gothic</a>
							<a href="#">à propos</a>
						</nav>
					</div> -->
					<!-- <div class="main"> -->						
					<!-- </div> -->
					
				</div>
			<!-- </div> -->
			<div id="content">
				<?php include $this->view ?>
			</div>
		</main>
	</body>
</html>