<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Projet Web</title>
</head>
<body>
    <div class="first-screen">
        <div class="nav-gradient">
            <nav class="navbar navbar-expand-md navbar-dark">
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
                                <a class="nav-link active" href="#">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="recherche.php">Produits</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">À propos</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link position-relative" href="panier.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart m-2 mt-0 mb-0"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                    <span class="position-absolute top-20 start-10 translate-middle badge rounded-pill bg-secondary">
                                        <?php
                                            if(isset($_SESSION['panier'])){
                                                echo array_sum($_SESSION['panier']);
                                            } else {
                                                echo "0";
                                            }
                                        ?>
                                    </span>
                                    <span class="m-2 mt-0 mb-0"></span>
                                    <span>Mon panier</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user m-1 mt-0 mb-0"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <?php
                                        if(isset($_SESSION['user'])){
                                            echo 'Bonjour, ' . $_SESSION['user']['prenom'];
                                        } else {
                                            echo 'Compte';
                                        }
                                    ?>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <?php
                                        if(isset($_SESSION['user'])){
                                            echo '<li><a class="dropdown-item" href="commandes.php">';
                                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>';
                                            echo '<span class="m-1 mt-0 mb-0"></span>';
                                            echo 'Mes commandes</a></li>';
                                            echo '<li><hr class="dropdown-divider"></li>';
                                            echo '<li><a class="dropdown-item" href="deconnexion.php">';
                                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-power"><path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path><line x1="12" y1="2" x2="12" y2="12"></line></svg>';
                                            echo '<span class="m-1 mt-0 mb-0"></span>';
                                            echo 'Déconnexion</a></li>';
                                        } else {
                                            echo '<li><a class="dropdown-item" href="connexion.php">';
                                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-in"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg>';
                                            echo '<span class="m-1 mt-0 mb-0"></span>';
                                            echo 'Se connecter</a></li>';
                                            echo '<li><a class="dropdown-item" href="inscription.php">';
                                            echo '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>';
                                            echo '<span class="m-1 mt-0 mb-0"></span>';
                                            echo 'S\'inscrire</a></li>';
                                        }
                                    ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="p-5 pt-0">
            <h2 class="text-left fw-bold title">Exprimez<br>votre style.</h2>
            <a href="recherche.php" class="btn btn-light rounded-pill m-2">Découvrez nos produits</a>
        </div>
        <div class="container">
            <div class="row pb-5 chevron-down">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
            </div>
        </div>
    </div>
    <div class="second-screen">
        <div class="row infocard p-4" id="ic1">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3 col-lg-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                    </div>
                    <div class="col-md-9">
                        <h3>Livraison rapide</h3>
                        <p>Nos livraisons sont parmis les plus sûres et les plus rapides du marché. En effet, près de 90% de nos clients en sont satifsait !</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row infocard p-4" id="ic2">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3 col-lg-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    </div>
                    <div class="col-md-9">
                        <h3>Produits de qualité</h3>
                        <p>Nos produits sont neufs et achettés dirrectement à l'usine. De plus, ils sont transportés par nos transporteurs certifiés, ce qui réduit le risque de produits défectueux.</p>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="row infocard p-4" id="ic3">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3 col-lg-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    </div>
                    <div class="col-md-9">
                        <h3>Service après vente</h3>
                        <p>Vous n'êtes pas satifsait par un produit acheté chez nous ? Ce n'est pas grave, vous avez 2 mois pour le renvoyer et ainsi bénéficier d'un coupon de réduction !</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
