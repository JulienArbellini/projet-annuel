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

        $driver = "mysql";
        $port = "3306";
    
        // tentative de connexion à la bdd si erreur afficher message d'erreur dans le formulaire
        try {
            $bdd = new PDO($driver.":dbname=".$base.";charset=utf8;host=".$hote.";port=".$port, $login, $mdp);

            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }

        
        // si pas d'erreur alors créer un fichier (.env ou config.php) dans lequel -> création des constantes avec leur valeur
        // fichier config.php doit être inclus dans le cms, 
        // executer le fichier sql d'insertion des tables

        
        
        $sql = file_get_contents('./base.sql');
        $sqlContrainte = file_get_contents('./insert.sql');
        $bdd->exec($sql);
        $bdd->exec($sqlContrainte);

    }
    ?>
</body>
</html>