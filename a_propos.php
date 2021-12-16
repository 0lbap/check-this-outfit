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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <div class="row mt-5">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h3 class="fw-light mb-4">Créateurs</h3>
                <div class="row">
                    <div class="col-sm-5 card text-center mx-auto shadow mb-5 mb-sm-0">
                        <div class="card-body">
                            <img src="images/pablo.jpg" alt="photo-axel" class="rounded-pill shadow mt-3 mb-4 img-fluid">
                            <h4 class="card-title fw-normal mt-2">Pablo</h4>
                            <h5 class="card-text text-muted fw-light">Co-fondateur</h5>
                            <a href="mailto:pablo.laviron@etu.umontpellier.fr" class="card-text text-muted fw-light">pablo.laviron@etu.umontpellier.fr</a>
                        </div>
                    </div>
                    <div class="col-sm-5 card text-center mx-auto shadow">
                        <div class="card-body">
                            <img src="images/Axel.jpg" alt="photo-axel" class="rounded-pill shadow mt-3 mb-4 img-fluid">
                            <h4 class="card-title fw-normal mt-2">Axel</h4>
                            <h5 class="card-text text-muted fw-light">Co-fondateur</h5>
                            <a href="mailto:axel.cazorla@etu.umontpellier.fr" class="card-text text-muted fw-light">axel.cazorla@etu.umontpellier.fr</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <h3 class="fw-light mb-4">Outils utilisés</h3>
                <div class="row justify-content-center">
                    <div class="col-11 card shadow p-4">
                        <div class="row justify-content-center">
                            <div class="col-5">
                                <ul class="list-unstyled">
                                    <li class="mb-4"><img src="images/html-5.png" alt="html-5" class="w-25"> HTML 5</li>
                                    <li class="mb-4"><img src="images/css-3.png" alt="css-3" class="w-25"> CSS 3</li>
                                    <li class="mb-4"><img src="images/php.png" alt="php" class="w-25"> PHP</li>
                                    <li class="mb-4"><img src="images/mysql.png" alt="mysql" class="w-25"> MySQL</li>
                                </ul>
                            </div>
                            <div class="col-5">
                                <ul class="list-unstyled">
                                    <li class="mb-4"><img src="images/js.png" alt="js" class="w-25"> JavaScript</li>
                                    <li class="mb-4"><img src="images/bootstrap.png" alt="bootstrap" class="w-25"> Bootstrap</li>
                                    <li class="mb-4"><img src="images/jquery.png" alt="jquery" class="w-25"> jQuery</li>
                                    <li class="mb-4"><img src="images/feather.svg" alt="feather" class="w-25"> Feather Icons</li>
                                </ul>
                            </div>
                        </div>
                        <div class="text-center">
                            Les images des articles sont extraites du site <a href="https://www.laboutiqueofficielle.com/" target="_blank">laboutiqueofficielle.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="container text-center pt-5">
        <h5>Ce site a été réalisé dans le cadre du projet de Programmation Web de fin de semestre en L2 Informatique à la faculté des sciences de Montpellier.</h5>
        <img src="images/logos.png" alt="logos-fds" class="p-5">
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
