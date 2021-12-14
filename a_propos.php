<?php
    session_start(); 
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
    <title>À propos | check-this-outfit</title>
</head>
<body>
    <?php
        $nav_style = "navbar navbar-expand-md navbar-dark bg-dark fixed-top";
        $nav_active = "a_propos";
        include 'nav.php';
    ?>
    <main class="container pt-5">
        <h1 class="display-6 mt-5 mb-5">À propos</h1>
        <h2 class="text-center">Site réalisé par</h2>
        <div class="row justify-content-center mt-5 mb-5">
            <div class="col-lg-5 row justify-content-center">
                <div class="col-5 col-md-4 col-lg-6">
                    <img src="https://via.placeholder.com/180x180.png" alt="photo-axel" class="rounded-pill">
                </div>
                <div class="col-5 col-md-4 col-lg-6 position-relative">
                    <div class="position-absolute top-50 translate-middle-y">
                        <h3 class="fw-normal">Axel</h3>
                        <h5 class="text-muted fw-light">Co-fondateur</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 row justify-content-center">
                <div class="col-5 col-md-4 col-lg-6">
                    <img src="https://via.placeholder.com/180x180.png" alt="photo-pablo" class="rounded-pill">
                </div>
                <div class="col-5 col-md-4 col-lg-6 position-relative">
                    <div class="position-absolute top-50 translate-middle-y">
                        <h3 class="fw-normal">Pablo</h3>
                        <h5 class="text-muted fw-light">Co-fondateur</h5>
                    </div>
                </div>
            </div>
        </div>
        <h2 class="text-center">Outils utilisés</h2>
        <div class="row justify-content-center m-5">
            <div class="col-3 col-lg"><img src="images/html-5.png" alt="html-5" class="img-fluid"></div>
            <div class="col-3 col-lg"><img src="images/css-3.png" alt="css-3" class="img-fluid"></div>
            <div class="col-3 col-lg"><img src="images/php.png" alt="php" class="img-fluid"></div>
            <div class="col-3 col-lg"><img src="images/mysql.png" alt="mysql" class="img-fluid"></div>
            <div class="col-3 col-lg"><img src="images/js.png" alt="js" class="img-fluid"></div>
            <div class="col-3 col-lg"><img src="images/bootstrap.png" alt="bootstrap" class="img-fluid"></div>
            <div class="col-3 col-lg"><img src="images/jquery.png" alt="jquery" class="img-fluid"></div>
            <div class="col-3 col-lg"><img src="images/feather.svg" alt="feather" class="img-fluid"></div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
