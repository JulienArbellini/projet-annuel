<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
</head>
<body>
    <?php
    if(isset($_POST['etape']) AND $_POST['etape'] == 1) { // si nous venons du formulaire alors
        $fichier = './config.php';
        
        $hote = trim($_POST['bdd-host']);
        $login = trim($_POST['bdd-user-name']);
        $mdp = trim($_POST['bdd-user-pwd']);
        $base = trim($_POST['bdd-name']);

        $texte = '<?php
            $base   = "'. $base .'";
            $hote   = "'. $hote .'";
            $login  = "'. $login .'";
            $mdp    = "'. $mdp .'";
            $port   = "8888";
            $bdd = new PDO(DBDRIVER.":dbname=".$base.";charset=utf8;host=".$hote.";port=".$port, $login, $mdp);
            ?>';

        $ouvrir = fopen($fichier, 'w');
        fwrite($ouvrir, $texte);

        echo 'Fichier de configuration : OK';
        fclose($ouvrir); // on ferme le fichier


        $requetes = ''; // on crée une variable vide car on va s'en servir après
             
        $sql = file('./base.sql'); // on charge le fichier SQL qui contient des requêtes
        foreach($sql as $lecture) { // on le lit
            if(substr(trim($lecture), 0, 2) != '--') { // suppression des commentaires et des espaces
                $requetes .= $lecture; // nous avons nos requêtes dans la variable
            // var_dump($requetes);
            }
        }
          
        $reqs = explode(';', $requetes); // on sépare les requêtes
        foreach($reqs as $req){	// et on les exécute
            if(!new PDO($req)) { // si la requête fonctionne bien et qu'elle n'est pas vide
                exit('ERREUR : '. $req); // message d'erreur
            }
        }

        // $texte = '<?php
        //     $hote   = "'. $hote .'";
        //     $login  = "'. $login .'";
        //     $mdp    = "'. $mdp .'";
        //     $base   = "'. $base .'";

        //     mysql_connect($hote,$login,$mdp);
        //     mysql_select_db($base);
        //     ';

        // $texte = 'Ceci est un texte, qui se trouve dans le fichier config.php';
        
        // $ouvrir = fopen($fichier, 'w');
        // fwrite($ouvrir, $texte);
    }
    ?>

    <!--  $this->pdo = new \PDO(DBDRIVER.":dbname=".$base.";charset=utf8;host=".$hote.";port=".DBPORT, $login, $mdp); -->
</body>
</html>