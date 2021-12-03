<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Produit • Projet Web</title>
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
                        <a class="nav-link active" href="recherche.php">Produits</a>
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
        <div class="row p-4">
            <?php
                $idProd = $_GET['id'];

                $bdd_user="root";
                $bdd_password="root";
                try 
                    {
                        $bdd = new PDO("mysql:host=localhost;dbname=projet_web;charset=utf8", "$bdd_user", "$bdd_password");
                    }
                catch(PDOException $e)
                    {
                        die('Erreur : '.$e->getMessage());
                    }
                
                $getproduct=$bdd->prepare("SELECT * FROM Produits WHERE idProduit= ?");
                $getproduct->execute(array($idProd));
                $productdata=$getproduct->fetch();

                if(!isset($idProd) || !is_numeric($idProd) || !$getproduct->rowcount()==1){
                    echo '<div class="alert alert-danger">Ce produit n\'existe pas ou a été supprimé</div>';
                    echo '<a href="recherche.php">Retour à la recherche</a>';
                    die();
                }


                // Format du panier : clé=idProd, valeur=quantité
                if(isset($_GET['addpanier'])){
                    if(isset($_SESSION['panier'])){
                        $panier = $_SESSION['panier'];
                    } else {
                        $panier = array();
                    }
                    if($_GET['addpanier']<=$productdata['stock'] && $_GET['addpanier']>0){
                        if(isset($panier[$idProd])){
                            $panier[$idProd]+=$_GET['addpanier'];
                        } else {
                            $panier[$idProd]=(int)$_GET['addpanier'];
                        }
                        $_SESSION['panier'] = $panier;
                        echo '<div class="alert alert-success m-0">Vous avez ajouté ' . $_GET['addpanier'] . ' ' . $productdata['nom'] . ' dans votre panier. <a href="panier.php" class="alert-link">Voir mon panier</a></div>';
                    } else {
                        echo '<div class="alert alert-danger m-0">Impossible d\'ajouter ' . $_GET['addpanier'] . ' ' . $productdata['nom'] . ' dans votre panier (pas assez de stock ou quantité invalide).</div>';
                    }
                }
            ?>
            <div class="col-md-6 mt-4">
                <?php echo '<img src="' . $productdata['photo'] . '" class="img-fluid" alt="Image du produit indisponible">'; ?>
            </div>
            <div class="col-md-4 mt-4">
                <form action="produit.php" method="GET">
                    <?php
                        echo '<h4 class="fw-light">' . $productdata['marque'] . '</h4>';
                        echo '<h3>' . $productdata['nom'] . '</h3>';
                        echo '<p class="text-muted fw-light">' . $productdata['categorie'] . '</p>';
                        echo '<p>' . $productdata['descriptif'] . '</p>';
                        echo '<h5>' . $productdata['prix'] . '€</h5>';
                        echo '<input type="hidden" name="id" value="' . $_GET['id'] . '">';
                        echo '<div class="row m-0 mt-3">';
                        if($productdata['stock']>0){
                            echo '<button type="submit" class="btn btn-dark col-8">Ajouter au panier</button>';
                            echo '<div class="col-4"><input type="number" class="form-control" name="addpanier" value="1" min="1" max="10"></div>';
                        } else {
                            echo '<button type="submit" class="btn btn-dark col-8" disabled>Rupture de stock</button>';
                            echo '<div class="col-4"><input type="number" class="form-control" name="addpanier" value="1" min="1" max="10" disabled></div>';
                        }
                        echo '</div>';
                        if($productdata['stock']<20){
                            echo '<p class="text-danger mt-2">Plus que ' . $productdata['stock'] . ' en stock !</p>';
                        }
                    ?>
                </form>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
