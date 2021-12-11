<?php
    session_start();
    include 'bdd.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Panier • Projet Web</title>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
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
                        <a class="nav-link" href="a_propos.php">À propos</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link position-relative active" href="panier.php">
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
    <main class="container pt-5">
        <div class="row mt-5">
            <?php                          
                date_default_timezone_set('Europe/Paris');
                
                if(isset($_SESSION['panier'])) {
                    $panier = $_SESSION['panier'];
                } else {
                    $panier = array();
                    echo '<div class="col-12 text-center mt-5">';
                    echo '<img class="w-25 pt-5 pb-3" src="images/sadcart.png" alt="">';
                    echo '<h5>Malheureusement, votre panier est vide...</h5>';
                    echo '<div>';
                    echo '<a href="recherche.php"><button type=button class="btn btn-dark mt-4 rounded-pill">Continuer mes achats</button></a>';
                    echo '</div>';
                    echo '</div>';
                    exit();
                }
                
                foreach($panier as $idProd => $quantite){
                    if(filter_input(INPUT_GET,'idsupp') == $idProd){
                        unset($panier[$idProd]);
                    }
                }
                $_SESSION['panier']=$panier;

                if($panier == array()){
                    echo '<div class="col-12 text-center mt-5">';
                    echo '<img class="w-25 pt-5 pb-3" src="images/sadcart.png" alt="">';
                    echo '<h5>Malheureusement, votre panier est vide...</h5>';
                    echo '<div>';
                    echo '<a href="recherche.php"><button type=button class="btn btn-dark mt-4 rounded-pill">Continuer mes achats</button></a>';
                    echo '</div>';
                    echo '</div>';
                    exit();
                }
                
                if(isset($_POST['commander'])){
                    if(!isset($_SESSION['user'])){
                        echo '<div class="alert alert-info mb-4">Connectez-vous pour passer la commande. <a href="connexion.php" class="alert-link">Connexion</a></div>';
                    } else {
                        $stocksOK=true;
                        foreach($panier as $idProd => $quantite){
                            $getproduct=$bdd->prepare("SELECT * FROM Produits WHERE idProduit= ?");
                            $getproduct->execute(array($idProd));
                            $productdata=$getproduct->fetch();
                            if ($productdata['stock']<$quantite){
                                $stocksOK=false;
                            }
                        }
                        if(!$stocksOK){
                            echo '<div class="alert alert-warning mb-4">Il n\'y a pas assez de stock disponible, veuillez modifier votre commande.</div>';
                        } else {
                            $ajoutCommande= $bdd -> prepare("INSERT INTO commandes VALUES(?,?,?,?)");
                            $ajoutCommande->execute(array(NULL,date('Y-m-d H:i:s'),$_SESSION['user']['email'],'En cours'));
                            $last_id=$bdd->lastInsertId();

                            foreach($panier as $idProd => $quantite){
                                $getproduct=$bdd->prepare("SELECT * FROM Produits WHERE idProduit= ?");
                                $getproduct->execute(array($idProd));
                                $productdata=$getproduct->fetch();
                                $updatestock = $bdd->prepare('UPDATE produits SET stock = ? WHERE idProduit = ?');
                                $updatestock -> execute(array($productdata['stock']-$quantite,$idProd));
                                $total = $quantite*$productdata['prix'];
                                $ajoutLigneCommande = $bdd->prepare("INSERT INTO lignescommandes VALUES(?,?,?,?,?)");
                                $ajoutLigneCommande->execute(array(NULL,$last_id,$idProd,$quantite,$total));
                            }

                            echo '<div class="alert alert-success">Votre commande a bien été effectuée. Vous allez recevoir un mail avec votre suivis de colis. Merci d\'avoir acheté sur notre site et à bientôt !</div>';
                            $_SESSION['panier']=array();
                            exit(); 
                        }
                    }
                }
            ?>
            <div class="card col-lg-8 shadow mb-5 mb-lg-0 h-100">
                <div class="card-body">
                    <?php
                        if(isset($_SESSION['user'])) {
                            echo '<h3 class="display-6">Votre panier</h3>';
                        } else {
                            echo '<h3 class="display-6">Votre panier (non connecté)</h3>';
                        }
                    ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center col-6">Produit</th>
                                <th class="text-center col-2">Prix unitaire</th>
                                <th class="text-center col-2">Quantité</th>
                                <th class="text-center col-2">Supprimer</th>
                            </tr>
                        </thead>

                        <?php
                            $total = 0;
                            $quantite_totale = 0;
                            foreach($panier as $idProd => $quantite){
                                $getproduct=$bdd->prepare("SELECT * FROM Produits WHERE idProduit= ?");
                                $getproduct->execute(array($idProd));
                                $productdata=$getproduct->fetch();
                                $prix = $quantite*$productdata['prix'];
                                $total += $prix;
                                $quantite_totale++;
                                echo "<tr>";
                                echo '<td>';
                                echo '<div class="row">';
                                echo '<div class="col-md-4">';
                                echo '<img src="' . $productdata['photo'] . '" alt="Image du produit indisponible" class="img-fluid d-none d-md-block">';
                                echo '</div>';
                                echo '<div class="col-md-8">';
                                echo '<h4>' . $productdata['nom'] . '</h4>';
                                echo '<h5>' . $productdata['marque'] . '</h5>';
                                echo '</div>';
                                echo '</div>';
                                echo '</td>';
                                echo '<td>';
                                echo '<p class="text-center pt-4">' . $productdata['prix'] . '€</p>';
                                echo '</td>';
                                echo '<td>';
                                echo '<p class="text-center pt-4">' . $quantite . '</p>';
                                echo '</td>';
                                echo '<td>';
                                echo '<div class="text-center mt-4">';
                                echo '<a href="panier.php?idsupp=' . $idProd . '"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>';
                                echo '</div>';
                                echo '</td>';
                                echo '</tr>';
                            } 
                        ?>
                    </table>
                    <p class="text-center mb-0">Vous avez <i class="text-warning"><?php echo $quantite_totale ?></i> produit(s) dans votre panier</p>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="card col-lg-3 shadow mb-5 mb-lg-0 h-100">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Récapitulatif</h3>
                    <div class="row">
                        <p class="col-6 card-text">Sous-total</p>
                        <p class="col-6 card-text text-end"><?php echo $total ?>€</p>
                    </div>
                    <div class="row">
                        <p class="col-6 card-text">Livraison</p>
                        <p class="col-6 card-text text-end">4.50€</p>
                    </div>
                    <hr>
                    <div class="row">
                        <p class="col-6 card-text fw-bold">Total</p>
                        <p class="col-6 card-text fw-bold text-end"><?php echo $total+4.5 ?>€</p>
                    </div>
                    <?php
                        if(isset($_SESSION['user'])){
                            echo '<h5 class="card-title mt-3 mb-3">Adresse de livraison :</h5>';
                            echo '<div class="row mb-4">';
                            echo '<code class="m-0 text-black">';
                            echo $_SESSION['user']['nom'] . ' ' . $_SESSION['user']['prenom'] . '<br>';
                            echo $_SESSION['user']['adresse'] . '<br>';
                            echo $_SESSION['user']['ville'] . '<br>';
                            echo $_SESSION['user']['telephone'] . '<br>';
                            echo '</code>';
                            echo '</div>';
                        }
                    ?>
                    <form action="panier.php" method="POST">
                        <div class="row m-2">
                            <button type="submit" name="commander" class="btn btn-warning btn-lg">Commander</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
