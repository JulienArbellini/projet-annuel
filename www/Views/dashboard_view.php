

<div id="top-content">
	<h1>Tableau de bord</h1>
</div>

<div id="main-content">
	<div class='shadow-box-square one'>
		<div id="text">
			<h1>Votre projet</h1>
			<p>Nom: MonSite</p>
			<p>URL: www.monsite.fr</p>
			<p>Pages: <?php echo $donnees[0]->nb;?></p>
			<p>Articles: <?php echo $donnees[1]->nb;?></p>
			
		
			
		</div>
	</div>
	<div class='shadow-box-square two'>
		<div id="text">
			<h1>Tutoriel</h1>
			<!-- <h2>Essaie les fonctionnalités de Teach'r:</h2> -->
			<div>
				<img <?php $count = 0; if($donnees[0]->nb == 0){echo 'src="../framework/img/checked.png"'; $count+=1;}else{echo 'src="../framework/img/not_checked.png"';}?> width='3%'>Crée une page</img>
			</div>
			<div>
				<img <?php if($donnees[1]->nb > 0){echo 'src="../framework/img/checked.png"'; $count+=1;}else{echo 'src="../framework/img/not_checked.png"';}?> width='3%'>Crée un article</img>
			</div>
			<div>
				<img <?php if($donnees[0]->nb > 0){echo 'src="../framework/img/checked.png"'; $count+=1;}else{echo 'src="../framework/img/noy_checked.png"';}?> width='3%'>Ajoute une image</input>
			</div>
			<div>
				<img <?php if($donnees[0]->nb > 0){echo 'src="../framework/img/checked.png"'; $count+=1;}else{echo 'src="../framework/img/noy_checked.png"';}?> width='3%'>Invite un utilisateur</input>
			</div>			

			<div id="avancement">
				<?php echo $count*100/4?>%
				<div class="progress">
					<style>
					@keyframes load {
						0% { width: 0; }
						100% { width: <?php echo $count*100/4 ?>%; }
					}
					</style>
					<div class="progress-value" ></div>
					
				</div><?php echo $count*100/4?>%
			</div>
			
		</div>
		
	</div>
	<div class='shadow-box-square three'>
		<div id="text">
			<h1>Dernières créations</h1>
<table class="responstable">
  
  <tr>
    <th>Type</th>
    <th data-th="Driver details"><span>Auteur</span></th>
    <th>Créé le</th>
	<th>Regarder</th>
  </tr>
  
  <tr>
    <td>Article</td>
    <td>Steve</td>
    <td><?php print_r($donnees[2]['createdAt']);?></td>
	<td>Clique ici</td>
  </tr>
  
  <tr>
    <td>Page</td>
    <td>Steffie</td>
    <td><?php print_r($donnees[2]['createdAt']);?></td>
	<td>Clique ici</td>

  </tr>
  
  
</table>
		</div>
	</div>
	<div class='shadow-box-square four'>
		<div id="text">
			<h1>FAQ</h1>
			<h2>Comment ajouter une page à votre site ?</h2>
			<p>Cliquez sur l’icone “+” situé à droite de la page. </p>
			<h2>Comment changer le thème de la page ?</h2>
			<p>Cliquez sur l’onglet “Thèmes” à sur la barre de navigation.</p>
			<div class="box-link">
				<div class="link">Voir plus de questions</div>
			</div>
		</div>
		
	</div>
</div>
	

<!-- <div class="progress">
    <div class="progress-value"></div>
</div> -->



<!-- <label class="switch">
    <input type="checkbox" checked>
    <span class="slider round"></span>
</label>

<label class="switch">
    <input type="checkbox">
    <span class="slider round"></span>
</label> -->

