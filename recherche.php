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
                        <a class="nav-link active" href="#">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">À propos</a>
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
    <main class="container">
        <div class="row mt-4">
            <div class="col-md-3 p-4 pb-3 pt-0 border-end">
                <form action="recherche.php" method="GET">
                    <h2>Rechercher</h2>
                    <div class="pb-3">
                        <label for="nom"><h6>Nom :</h6></label>
                        <input type="text" class="form-control" name="nom" id="nom" placeholder="ex : Sweat...">
                    </div>
                    <div class="pb-3">
                        <label for="motscles"><h6>Mots-clés :</h6></label>
                        <input type="text" class="form-control" name="motscles" id="motscles" placeholder="ex : Coton...">
                    </div>
                    <div class="pb-3">
                        <h6>Marques :</h6>
                        <div class="form-check">
                            <label class="form-check-label" for="check-m-apple">Apple</label>
                            <input type="checkbox" class="form-check-input" name="marque[]" value="apple" id="check-apple">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="check-m-samsung">Samsung</label>
                            <input type="checkbox" class="form-check-input" name="marque[]" value="samsung" id="check-samsung">
                        </div>
                    </div>
                    <div class="pb-3">
                        <h6>Catégories :</h6>
                        <div class="form-check">
                            <label class="form-check-label" for="check-c-telephone">Téléphone</label>
                            <input type="checkbox" class="form-check-input" name="categorie[]" value="telephone" id="check-c-telephone">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="check-c-ordinateur">Ordinateur</label>
                            <input type="checkbox" class="form-check-input" name="categorie[]" value="ordinateur" id="check-c-ordinateur">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark">Rechercher</button>
                </form>
            </div>
            <div class="col-md-9 p-4 pb-0 pt-0">
                <div class="row">
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
                        
                        // Création de la requête :
                        $sql="SELECT * FROM Produits";
                        if(!empty($_GET['marque']) || !empty($_GET['categorie'])){
                            $sql.=" WHERE";
                            if(!empty($_GET['marque'])){
                                $i=0;
                                $sql.=" (";
                                foreach($_GET['marque'] as $marque){
                                    if($i>0){
                                        $sql.=" OR";
                                    }
                                    $sql.=" marque='$marque'";
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
                                    $sql.=" categorie='$categorie'";
                                    $i++;
                                }
                                $sql.=")";
                            }
                        }
                        if(!empty($_GET['nom']) || !empty($_GET['motscles'])){
                            $sql.=" GROUP BY idProduit HAVING";
                            if(!empty($_GET['nom'])){
                                $j=0;
                                $nom=$_GET['nom'];
                                $sql.=" nom LIKE '%$nom%'";
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
                                    $sql.=" descriptif LIKE '%$motcle%'";
                                    $j++;
                                }
                                $sql.=")";
                            }
                        }

                        // Binding des paramètres et exécution:
                        $getproducts=$bdd->prepare($sql);
                        $getproducts->execute();
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
