<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
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
                        <a class="nav-link active" href="recherche.php">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="a_propos.php">À propos</a>
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
    
    <?php                          
        date_default_timezone_set('Europe/Paris');

        $bdd_user="root";
        $bdd_password="";
        try 
            {
                $bdd = new PDO("mysql:host=localhost;dbname=projet_web;charset=utf8", "$bdd_user", "$bdd_password");
            }
        catch(PDOException $e)
            {
                die('Erreur : '.$e->getMessage());
            }
        

        if(isset($_SESSION['panier'])) {
            $panier = $_SESSION['panier'];
        } else {
            $panier = array();
            echo '<div class="col-12 text-center mt-5">';
            echo '<img class="w-25 pt-5 pb-3" src="sadcart.png" alt="">';
            echo '<h5>Malheureusement ton panier est vide...</h5>';
            echo '<div>';
            echo '<a href="recherche.php"><button type=button class="btn btn-primary mt-4">Continuer mes achats</button></a>';
            echo '</div>';
            echo '</div>';
            exit();
        }
        
            foreach ($panier as $idProd => $quantite){
                if(filter_input(INPUT_GET,'idsupp') == $idProd){
                    unset($panier[$idProd]);
                }
            }
        $_SESSION['panier']=$panier;

        if ($panier == array()){
            echo '<div class="col-12 text-center mt-5">';
            echo '<img class="w-25 pt-5 pb-3" src="sadcart.png" alt="">';
            echo '<h5>Malheureusement ton panier est vide...</h5>';
            echo '<div>';
            echo '<a href="recherche.php"><button type=button class="btn btn-primary mt-4">Continuer mes achats</button></a>';
            echo '</div>';
            echo '</div>';
            exit();
        }
        
        if (isset($_POST['commander'])){
            if(!isset($_SESSION['email'])){
                echo 'Connecte-toi pd';
                exit();
            }
            $stocksOK=true;
            foreach ($panier as $idProd => $quantite){
                $getproduct=$bdd->prepare("SELECT * FROM Produits WHERE idProduit= ?");
                $getproduct->execute(array($idProd));
                $productdata=$getproduct->fetch();
                if ($productdata['stock']<$quantite){
                    $stocksOK=false;
                }
            }
            if (!$stocksOK){
                echo 'Pas assez de stocks';
                exit();
            }else {
                $ajoutCommande= $bdd -> prepare("INSERT INTO commandes VALUES(?,?,?,?)");
                $ajoutCommande->execute(array(NULL,date('Y-m-d H:i:s'),$_SESSION['email'],'En cours'));
                $last_id=$bdd->lastInsertId();

                
                foreach ($panier as $idProd => $quantite){
                    $getproduct=$bdd->prepare("SELECT * FROM Produits WHERE idProduit= ?");
                    $getproduct->execute(array($idProd));
                    $productdata=$getproduct->fetch();
                    $updatestock = $bdd->prepare('UPDATE produits SET stock = ? WHERE idProduit = ?');
                    $updatestock -> execute(array($productdata['stock']-$quantite,$idProd));
                    $total = $quantite*$productdata['prix'];
                    $ajoutLigneCommande = $bdd->prepare("INSERT INTO lignescommandes VALUES(?,?,?,?,?)");
                    $ajoutLigneCommande->execute(array(NULL,$last_id,$idProd,$quantite,$total));
                }
                echo 'Commande effectuée';
                $_SESSION['panier']=array();
                exit(); 
                }
        }
?>

    <section class="pt-5 pb-5">
        <div class="row" style="margin-top:10px">
            <div class="card col-7 shadow" style="border-radius:25px; margin-top: auto ; margin-bottom: auto ; margin-left: 100px ; margin-right: 70px ; padding : 20px 25px ">
                <?php if(isset($_SESSION['nom'])) {
                        echo '<h3 class="col display-5 mb-3 text-left pt-0">Panier <i>- '.$_SESSION['prenom'].' '.$_SESSION['nom'].'</i></h3>';
                    }
                    else {
                        echo '<h3 class="col display-5 mb-3 text-left pt-0">Panier <i>- Invité</i></h3>';
                    }
                ?>

                    <table id="shoppingCart" class="table table-condensed table-responsive table-hover">
                        <thead>
                            <tr>
                                <th style="width:18%">Produit</th>
                                <th style="width:12%" class="text-center">Prix</th>
                                <th style="width:10%" class="text-center">Quantité</th>
                                <th style="width:16%" class="text-center">Supprimer</th>
                            </tr>
                        </thead>

                        <?php
                            $total = 0;
                            $quantite_totale = 0;
                            $test=array('1'=>1);
                            foreach($panier as $idProd => $quantite ){

                                $getproduct=$bdd->prepare("SELECT * FROM Produits WHERE idProduit= ?");
                                $getproduct->execute(array($idProd));
                                $productdata=$getproduct->fetch();
                                $total = $quantite*$productdata['prix'];
                                $quantite_totale ++;
                                echo "<tr>";
                                echo '<td data-th="Product">';
                                echo '<div class="row">';
                                echo '<div class="col-md-3 text-left">';
                                echo '<img src="' . $productdata['photo'] . '" alt="Image du produit indisponible" class="img-fluid d-none d-md-block rounded mb-2 shadow ">';
                                echo '</div>';
                                echo '<div class="col-md-9 text-left mt-sm-2">';
                                echo '<h4>'.$productdata['nom'].'</h4>';
                                echo '<p class="font-weight-light"><h5>'.$productdata['marque'].'</h5></p>';
                                echo '</div>';
                                echo '</td>';
                                echo '<td data-th="Price">';
                                echo '<div class="text-center" style="padding-top:38px;">';
                                echo $total.' €';
                                echo '</div>';
                                echo '</td>';
                                echo '<td data-th="Quantity">';
                                echo '<div class="text-center" style="padding-top:25px;">';

                                echo '<input type="number" min="1" max ="10" class="form-control form-control-lg text-center" value="'.$quantite.'">';
                                echo '</td>';
                                echo '<td class="actions" data-th="">';
                                echo '<div class="text-center" style="padding-top:38px;">';
                                echo '<a href="panier.php?idsupp='.$idProd.'"><img src="trash-outline.svg" style="width:30px"></a>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</td>';
                                echo '</tr>';
                            } 
                        ?>
                    </table>
                    <p class="col mb-0 text-center pt-1" style="text-align:center">
                        Vous avez <i class="text-warning"><?php echo $quantite_totale ?></i> produit(s) dans votre panier</p>          
                    

                </div>
            
            <div class="card col-3 shadow" style="border-radius:25px; margin:auto 0">
                <div class="card-body ">
                    <h4 class="card-title text-center"><b>Récapitulatif</b></h4>
                    <br>
                    <div class="row">
                        <p class="col-9 card-text">Sous-total</p>
                        <p class="col-3 card-text text-left"><?php echo $total ?> €</p>
                    </div>
                    <div class="row">
                        <p class="col-9 card-text">Livraison</p>
                        <p class="col-3 card-text text-right">4.50 €</p>
                    </div>
                    <hr>
                    <div class="row">
                        <p class="col-9 card-text"><b>Total (taxe incluse)</b></p>
                        <p class="col-3 card-text text-left"><b><?php echo $total+4.50 ?> €</b></p>
                    </div>
                    <form action="panier.php" method="POST">
                    <div class="text-center pt-2">
                        <button type="submit" name="commander" class="btn btn-warning btn-lg" style="width:250px; border-radius:10px;">Commander</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="test.js"></script>
    </body>
    </html>
