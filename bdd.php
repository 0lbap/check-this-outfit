<?php
    $bdd_user="root";
    $bdd_password="root";
    try {
        $bdd = new PDO("mysql:host=localhost;dbname=projet_web;charset=utf8", "$bdd_user", "$bdd_password");
    } catch(PDOException $e) {
        die('Erreur : '.$e->getMessage());
    }
?>