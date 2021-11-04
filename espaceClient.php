<?php
    session_start(); 

    if (!isset($_SESSION['email'])){
        header('location:index.php');
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <a href="deconnexion.php">Se déconnecter</a>
    <div align='center'>
        <h1>ESPACE CLIENT</h1>
        <h2>Contents de te revoir <?php echo  $_SESSION['prenom'] ?> !</h2><br><br>
        <a href="indexclient.php">Retour à l'accueil</a>
    </div>
</body>
</html>
