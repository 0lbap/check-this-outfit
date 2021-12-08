<?php session_start(); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Recherche • Projet Web</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="https://via.placeholder.com/30x30.png?text=LOGO" alt="LOGO">
                Projet Web
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="recherche.php">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="a_propos.php">À propos</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php
                                if(isset($_SESSION['email'])){
                                    echo 'Bonjour, ' . $_SESSION['prenom'];
                                } else {
                                    echo 'Compte';
                                }
                            ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <?php
                                if(isset($_SESSION['email'])){
                                    echo '<li><a class="dropdown-item" href="panier.php">Mon panier</a></li>';
                                    echo '<li><a class="dropdown-item" href="commandes.php">Mes commandes</a></li>';
                                    echo '<li><hr class="dropdown-divider"></li>';
                                    echo '<li><a class="dropdown-item" href="deconnexion.php">Déconnexion</a></li>';
                                } else {
                                    echo '<li><a class="dropdown-item" href="connexion.php">Se connecter</a></li>';
                                    echo '<li><a class="dropdown-item" href="inscription.php">S\'inscrire</a></li>';
                                }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top:120px">
        <div class="mt-5 mb-5"><h1><b>À propos</b></h1></div>
        <h2 class="text-center">Site réalisé par</h2>
        <div class="row justify-content-center mt-5 mb-5">
              <img src="images/axel.jpg" alt="" style="width:180px; border-radius:50%">
              <div class="col-2 pt-4"><h3>Axel</h3><h5 style="color:grey" >Creator of JQuery</h5></div>
              <img src="images/pablo.jpg" alt="" style="width:180px; border-radius:50%">
              <div class="col-2 pt-4"><h3>Pablo</h3><h5 style="color:grey">Javascript CEO</h5></div>                              
        </div>
        <h2 class="text-center">Outils utilisés</h2>
        <div class="row justify-content-center mt-5">
              <img src="images/html-5.png" alt="" style="width:125px">
              <img src="images/css-3.png" alt="" style="width:125px">
              <img src="images/php.png" alt="" style="width:125px">
              <img src="images/mysql.png" alt="" style="width:125px">
              <img src="images/js.png" alt="" style="width:125px">
              <img src="images/bootstrap.png" alt="" style="width:125px">
              <img src="images/jquery.png" alt="" style="width:125px">
              <img src="images/feather.svg" alt="" style="width:125px">          
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>