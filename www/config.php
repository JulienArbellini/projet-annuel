<?php
            $base = "test";
            $hote = "database";
            $login = "root";
            $mdp = "password";
            $port = "3306";
            $driver = "mysql";
            echo "test";
            // $bdd = mysqli_connect($hote, $login, $mdp);
            try {
                $bdd = new PDO($driver.":dbname=".$base.";charset=utf8;host=".$hote.";port=".$port, $login, $mdp);
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
            ?>