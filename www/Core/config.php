<?php

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=tr_login;charset=utf8', 'root', '')
    }catch{
        die('Erreur'.$e->getMessage());
    }