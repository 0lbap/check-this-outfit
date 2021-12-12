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
            <?php
                $nav_style = "navbar navbar-expand-md navbar-dark";
                $nav_active = "index";
                include 'nav.php';
            ?>
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
            <div class="col-md-6 position-relative">
                <div class="row position-absolute top-50 translate-middle-y">
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
            <div class="col-md-6 d-none d-md-block"></div>
            <div class="col-md-6 position-relative">
                <div class="row position-absolute top-50 translate-middle-y">
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
            <div class="col-md-6 position-relative">
                <div class="row position-absolute top-50 translate-middle-y">
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
