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
    <main class="container w-100 mt-3">
        <br>
        <br>
        <div class="col-20 ml-5">
        <div class="row mt-5">
            <h3 class="col-5">Créateurs</h3>
            <h3 class="col-6" style="margin-left:85px">Outils utilisés</h3>
        </div>
        <div class="row col-16 mt-1 mb-5 ">
            <div class="card bg-light text-center  mt-3 mx-3" style="width:280px">
                    <div class="card-body">
                        <img src="images/Pablo.jpg" alt="photo-axel" class="rounded-pill shadow mt-3 mb-4" style="width:180px">
                        <h4 class="card-title fw-normal mt-2">Pablo</h4>
                        <h5 class="card-text text-muted fw-light">Co-fondateur</h5>
                        <h6 class="card-text text-muted fw-light">pablo.laviron@etu.umontpellier.fr</h6>
                    </div>
            </div>
            <div class="card bg-light text-center  mt-3 mx-3" style="width:280px">
                <div class="card-body pb-4">
                    <img src="images/Axel.jpg" alt="photo-axel" class="rounded-pill shadow mt-3 mb-4" style="width:180px">
                    <h4 class="card-title fw-normal mt-2">Axel</h4>
                    <h5 class="card-text text-muted fw-light">Co-fondateur</h5>
                    <h6 class="card-text text-muted fw-light">axel.cazorla@etu.umontpellier.fr</h6>
                </div>
            </div>
            <div class="card bg-light col-lg-6 mt-3 pb-4" style="margin-left:25px">
                <div class="row justify-content-center mt-4 ml-5 mr-5 mb-0 pb-1">
                    
                        <div class="col-5">
                            <ul style="list-style-type: none;">
                                <li><div class=""><img src="images/html-5.png" alt="html-5" class="w-25"> HTML 5</div></li>
                                <br>
                                <li><div class=""><img src="images/css-3.png" alt="css-3" class="w-25"> CSS 3</div></li>
                                <br>
                                <li><div class=""><img src="images/php.png" alt="php" class="w-25"> PHP</div></li>
                                <br>
                                <li><div class=""><img src="images/mysql.png" alt="mysql" class="w-25"> MySQL</div></li>
                            </ul>
                        </div>
                        <div class="col-5">
                            <ul style="list-style-type: none;">
                                <li><div class=""><img src="images/js.png" alt="js" class="w-25"> JavaScript</div></li>
                                <br>
                                <li><div class=""><img src="images/bootstrap.png" alt="bootstrap" class="w-25"> Bootstrap</div></li>
                                <br>
                                <li><div class=""><img src="images/jquery.png" alt="jquery" class="w-25"> jQuery</div></li>
                                <br>
                                <li><div class=""><img src="images/feather.svg" alt="feather" class="w-25"> Feather Icons</div></li>
                            </ul>
                        </div>
                </div>
                <div class="text-center">
                    <h6>Les images des articles sont extraites du site <a href="https://www.laboutiqueofficielle.com/" target="_blank">laboutiqueofficielle.com</a> </h6>
                </div>
            </div>
        </div>
        <h4 class="text-center pt-3"><i>Ce site a été réalisé dans le cadre du projet de Programmation Web de fin de semestre en L2 Informatique à la faculté des sciences de Montpellier.</i></h4>
        <div class="text-center mt-5">
            <img src="images/logos.png" alt="">
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
