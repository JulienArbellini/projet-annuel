<?php
            $base   = "test";
            $hote   = "database";
            $login  = "root";
            $mdp    = "password";
            $port   = "8888";
            $bdd = new PDO(DBDRIVER.":dbname=".$base.";charset=utf8;host=".$hote.";port=".$port, $login, $mdp);
            ?>