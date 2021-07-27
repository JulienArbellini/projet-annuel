<div id="main-content">
	<div class='shadow-box-square one'>
		<div class='preview'>
			<img src="/framework/dist/images/website.png"></img>
		</div>
		<div class="projet-dashboard">
			<div class='title-project'>
				<h1>Bonjour <?php echo $_SESSION['prenom']?> ! </h1>
			</div>
			<div class="subtitle">
				Votre projet est hébergé sur: <?php echo 'http://'.$_SERVER['HTTP_HOST'];?>	
			</div>

			<div class='hr-style'>
				<hr class='hr-complete'>
			</div>

			<div class="text">
				<div class="text-deux">	
					<p>Page d'accueil: <a href='<?php echo $_SESSION['slug_accueil'][0]["slug"]; ?>'>voir</a></p>
				</div>
				<div class="vl"></div>
				<div class="text-deux">	
					<p>Nombre de pages: <?php echo $donnees[0]->nb;?></p>
				</div>

				<div class="vl"></div>
				<div class='text-deux'>
					<p>Nombre d'articles: <?php echo $donnees[1]->nb;?></p>		
				</div>
			</div>
			
		</div>
		

	</div>
	<div class='two'>
		<div id="text">
			<div class='top-box-two'>
				<div class="text-top-box">
					<h1>Débutez avec Teach'r</h1>	
				</div>
				<div id="avancement">
					<div class='avancement-text'>
						<?php if(4-$_SESSION['count']>1){echo 4-$_SESSION['count']  . ' étapes restantes'; }elseif(4-$_SESSION['count']==1){echo '1 étape restante';}else{echo '0 étape restante';} ?>
					</div>
					<div class="progress">
						<style>
							@keyframes load {
								0% { width: 0; }
								100% { width: <?php $_SESSION['count']=$count; echo $count*100/4 ?>%; }
							}
							</style>
						<div class="progress-value" ></div>
					</div>
				</div>		
			</div>

			<div class='hr-style'>
				<hr class='hr-complete'>
			</div>

			<div class='bottom-box-two'>
				<div class="bottom-box-two-list">
					<a href='/pages' class='taches'>
						<div class='image-tache'>
							<?php $count = 0; if($donnees[0]->nb > 1){echo '<img src="../framework/img/checked.png"></img>'; $count+=1;}?> 
						</div>
						<div class='texte-tache'>
							<div class='text-tache-here <?php if($donnees[0]->nb == 1){echo 'no';}?>'>Créez une page</div>
						</div>
					</a>
					<a href='/articles' class='taches'>
						<div class='image-tache'>
							<?php if($donnees[1]->nb > 1){echo '<img src="../framework/img/checked.png"></img>'; $count+=1;}?> 
						
						</div>
						<div class='texte-tache'>
							<div class='text-tache-here <?php if($donnees[1]->nb <= 1){echo 'no';}?>'>Créez un article</div>
						</div>
					</a>
					<a href='/profil' class='taches'>
						<div class='image-tache'>
							<?php 
								if($donnees[6]['avatar'] != NULL){
									echo '<img src="../framework/img/checked.png"></img>' ;
									$count+=1 ;
								}
							?>
						</div>
						<div class='texte-tache'>
							<div class='text-tache-here 
							<?php
								if($donnees[6]['avatar'] == NULL){
								echo 'no';
								}
							?>'>Ajoutez une photo de profil</div>
						</div>
					</a>
					<a href='/utilisateurs' class='taches'>
						<div class='image-tache'>
							<?php if($donnees[5]->nb > 2){echo '<img src="../framework/img/checked.png"></img>'; $count+=1;}?>
						</div>	
						<div class='texte-tache'>
							<div class='text-tache-here <?php if($donnees[5]->nb <= 2){echo 'no';}?>'>Invitez un utilisateur</div>
						</div>		
					</a>
				</div>
				<div class='bottom-box-two-number'>
					<?php echo $count . ' / 4'?> 
				</div>
				
			</div>
			
			

			<div id="avancement">
				<div class="progress">
					<style>
						@keyframes load {
							0% { width: 0; }
							100% { width: <?php $_SESSION['count']=$count; echo $count*100/4 ?>%;}
						}
						</style>
					<!-- <div class="progress-value" ></div> -->
					
				</div>
			</div>
			
		</div>
		
	</div>

	<div class='three'>
		<div id="text">
			<div class="">

			</div>

			<div class="">
				<h1>Données analytiques</h1>
			</div>
			
			<div class='hr-style'>
				<hr class='hr-complete'>
			</div>
			
			<div class="tree-type">
				<div class="tree-title">
					Articles
				</div>
				<div class="tree-total">
					total: <?php echo $donnees[1]->nb;?>
				</div>
				<div class="tree-last">
					dernier article créé: <?php print_r($donnees[3]['title']);?>
				</div>
				<div class="tree-author">
					par: <?php print_r($donnees[3]['firstname']);?>
				</div>
				<div class="tree-date">
					date: <?php print_r($donnees[3]['createdAt']);?>
				</div>
				<div class="tree-see">
					voir: <a href='<?php print_r($donnees[3]['slug']);?>'><?php print_r($donnees[3]['slug']);?></a>
				</div>		
			</div>
			
			<div class='hr-style'>
				<hr class='hr-complete'>
			</div>

			<div class="tree-type">
				<div class="tree-title">
					Pages
				</div>
				<div class="tree-total">
					total: <?php echo $donnees[0]->nb;?>
				</div>
				<div class="tree-last">
					derniere page créée: <?php print_r($donnees[2]['title']);?>
				</div>
				<div class="tree-author">
					par: <?php print_r($donnees[2]['firstname']);?>
				</div>
				<div class="tree-date">
					date: <?php print_r($donnees[2]['createdAt']);?>
				</div>
				<div class="tree-see">
					voir: <a href='<?php print_r($donnees[2]['slug']);?>'><?php print_r($donnees[2]['slug']);?></a>
				</div>	
			</div>

			<div class='hr-style'>
				<hr class='hr-complete'>
			</div>

			<div class="tree-type">
				<div class="tree-title">
					Utilisateurs
				</div>
				<div class="tree-total">
					total:  <?php echo $donnees[5]->nb;?>
				</div>
				<div class="tree-last">
					dernier utilisateur ajouté: <?php print_r($donnees[4]['firstname']);?>
				</div>
				<div class="tree-role">
					rôle: <?php print_r($donnees[4]['Role_idRole']);?>
				</div>
				<div class="tree-date">
					date: <?php print_r($donnees[4]['createdAtUser']);?>
				</div>	
			</div>
			
		</div>
	</div>
	<div class='four'>
		<div id="text">
		<div class="four-type">
				<div class="four-title">
					<h1>FAQ</h1>
				</div>

				<div class='hr-style'>
					<hr class='hr-complete'>
				</div>

				<div class="four-question">
					<h2>Comment ajouter une page à votre site ?</h2>
				</div>
				<div class="four-answer">
					<p>Sur la page "pages" cliquez sur le bouton "ajouter" et renseignez les informations sur votre page...</p>
				</div>
				<div class="four-question">
					<h2>Comment changer mon mot de passe ?</h2>
				</div>
				<div class="four-answer">
					<p>Cliquez sur votre nom en haut à droite de votre écran, vous accéderez aux réglages de votre profil...</p>
				</div>	
			</div>
			
			
			
			
			
			<div class="box-link">
				<div class="link-faq"><a href='/FAQ'>Voir plus de questions</a></div>
			</div>
		</div>
		
	</div>
</div>


