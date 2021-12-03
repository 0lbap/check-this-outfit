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
                        <a class="nav-link active" href="#">Produits</a>
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
    <?php
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
    ?>
    <main class="container pt-5">
        <div class="row mt-4">
            <div class="col-md-3 p-4 pb-3 pt-0 border-end">
                <form action="recherche.php" method="GET">
                    <h3>Rechercher</h3>
                    <div class="mb-3">
                        <label for="nom"><h6>Nom :</h6></label>
                        <input type="text" class="form-control" name="nom" id="nom" placeholder="ex : Sweat...">
                    </div>
                    <div class="mb-3">
                        <label for="motscles"><h6>Mots-clés :</h6></label>
                        <input type="text" class="form-control" name="motscles" id="motscles" placeholder="ex : Coton...">
                    </div>
                    <div class="mb-3">
                        <h6>Marques :</h6>
                        <?php
                            $sql="SELECT DISTINCT marque FROM Produits";
                            $getmarques=$bdd->prepare($sql);
                            $getmarques->execute();
                            $marquesdata=$getmarques->fetchAll();
                            foreach($marquesdata as $marque){
                                echo '<div class="form-check">';
                                echo '<label class="form-check-label" for="check-marq-' . strtolower($marque['marque']) . '">' . $marque['marque'] . '</label>';
                                echo '<input type="checkbox" class="form-check-input" name="marque[]" value="' . strtolower($marque['marque']) . '" id="check-marq-' . strtolower($marque['marque']) . '">';
                                echo '</div>';
                            }
                        ?>
                    </div>
                    <div class="mb-3">
                        <h6>Catégories :</h6>
                        <?php
                            $sql="SELECT DISTINCT categorie FROM Produits";
                            $getcategories=$bdd->prepare($sql);
                            $getcategories->execute();
                            $categoriesdata=$getcategories->fetchAll();
                            foreach($categoriesdata as $categorie){
                                echo '<div class="form-check">';
                                echo '<label class="form-check-label" for="check-cat-' . strtolower($categorie['categorie']) . '">' . $categorie['categorie'] . '</label>';
                                echo '<input type="checkbox" class="form-check-input" name="categorie[]" value="' . strtolower($categorie['categorie']) . '" id="check-cat-' . strtolower($categorie['categorie']) . '">';
                                echo '</div>';
                            }
                        ?>
                    </div>
                    <div class="mb-3">
                        <h6>Couleurs :</h6>
                        <?php
                            $sql="SELECT DISTINCT couleur FROM Produits";
                            $getcouleurs=$bdd->prepare($sql);
                            $getcouleurs->execute();
                            $couleursdata=$getcouleurs->fetchAll();
                            foreach($couleursdata as $couleur){
                                echo '<div class="form-check">';
                                echo '<label class="form-check-label" for="check-coul-' . strtolower($couleur['couleur']) . '">' . $couleur['couleur'] . '</label>';
                                echo '<input type="checkbox" class="form-check-input" name="couleur[]" value="' . strtolower($couleur['couleur']) . '" id="check-coul-' . strtolower($couleur['couleur']) . '">';
                                echo '</div>';
                            }
                        ?>
                    </div>
                    <div class="mb-3">
                        <h6>Prix :</h6>
                        <div class="row">
                            <div class="col-6">
                                <label for="pmin">Min</label>
                                <input type="number" class="form-control" name="pmin" id="pmin" placeholder="0">
                            </div>
                            <div class="col-6">
                                <label for="pmax">Max</label>
                                <input type="number" class="form-control" name="pmax" id="pmax" placeholder="1000">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark">Rechercher</button>
                </form>
            </div>
            <div class="col-md-9 p-4 pb-0 pt-0">
                <div class="row">
                    <?php
                        // Création de la requête :
                        $sql="SELECT * FROM Produits";
                        $params=array();
                        $sql.=" WHERE";

                        // MARQUE, CATEGORIE ET COULEUR
                        if(!empty($_GET['marque'])){
                            $i=0;
                            $sql.=" (";
                            foreach($_GET['marque'] as $marque){
                                if($i>0){
                                    $sql.=" OR";
                                }
                                $sql.=" marque=?";
                                array_push($params,$marque);
                                $i++;
                            }
                            $sql.=")";
                        }
                        if(!empty($_GET['categorie'])){
                            if(isset($i)){
                                $sql.=" AND";
                            }
                            $i=0;
                            $sql.=" (";
                            foreach($_GET['categorie'] as $categorie){
                                if($i>0){
                                    $sql.=" OR";
                                }
                                $sql.=" categorie=?";
                                array_push($params,$categorie);
                                $i++;
                            }
                            $sql.=")";
                        }
                        if(!empty($_GET['couleur'])){
                            if(isset($i)){
                                $sql.=" AND";
                            }
                            $i=0;
                            $sql.=" (";
                            foreach($_GET['couleur'] as $couleur){
                                if($i>0){
                                    $sql.=" OR";
                                }
                                $sql.=" couleur=?";
                                array_push($params,$couleur);
                                $i++;
                            }
                            $sql.=")";
                        }

                        // PRIX
                        $pmin=0;
                        $pmax=1000;
                        if(isset($_GET['pmin']) && is_numeric($_GET['pmin'])){
                            $pmin=$_GET['pmin'];
                        }
                        if(isset($_GET['pmax']) && is_numeric($_GET['pmax'])){
                            $pmax=$_GET['pmax'];
                        }
                        if(isset($i)){
                            $sql.=" AND";
                        }
                        $sql.=" (prix BETWEEN ? AND ?)";
                        array_push($params,$pmin,$pmax);

                        // NOM ET MOTS CLES
                        if(!empty($_GET['nom']) || !empty($_GET['motscles'])){
                            $sql.=" GROUP BY idProduit HAVING";
                            if(!empty($_GET['nom'])){
                                $j=0;
                                $nom=$_GET['nom'];
                                $sql.=" nom LIKE ?";
                                array_push($params,"%".$nom."%");
                            }
                            if(!empty($_GET['motscles'])){
                                if(isset($j)){
                                    $sql.=" AND";
                                }
                                $j=0;
                                $sql.=" (";
                                $motscles=explode(' ', $_GET['motscles']);
                                foreach($motscles as $motcle){
                                    if($j>0){
                                        $sql.=" AND";
                                    }
                                    $sql.=" descriptif LIKE ?";
                                    array_push($params,"%".$motcle."%");
                                    $j++;
                                }
                                $sql.=")";
                            }
                        }

                        // Binding des paramètres et exécution:
                        $getproducts=$bdd->prepare($sql);
                        $getproducts->execute($params);
                        $productsdata=$getproducts->fetchAll();
                        
                        // Affichage :
                        if(empty($productsdata)){
                            echo '<h5>Aucun article ne correspond à votre recherche.</h5>';
                        } else {
                            echo '<h5>' . count($productsdata) . ' article(s) trouvé(s).</h5>';
                        }
                        foreach($productsdata as $product){
                            echo '<div class="col-md-4 p-2">';
                            echo '<a href="produit.php?id=' . $product['idProduit'] . '" class="text-decoration-none text-reset">';
                            echo '<div class="card">';
                            echo '<img src="' . $product['photo'] . '" class="card-img-top" alt="Image du produit indisponible">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . $product['nom'] . '</h5>';
                            echo '<p class="card-text">' . $product['prix'] . '€</p>';
                            echo '</div>';
                            echo '</div>';
                            echo '</a>';
                            echo '</div>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
