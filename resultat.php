<?php

include('./config.php'); // connexion à la base de données

$requete = "SELECT * FROM tuto"; // création de la requête
$resultat = mysql_query($requete) or die(mysql_error('ERREUR SQL '. $requete)); // exécution de la requête
while($donnees = mysql_fetch_array($resultat)) { // boucle et tableau pour récupérer les données
echo 'id = '. $donnees['id'] .'<br />';
echo 'nom = '. $donnees['nom'] .'<br />';
}
?>