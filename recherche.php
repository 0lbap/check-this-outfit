<?php
    session_start(); 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    include 'bdd.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Recherche | check-this-outfit</title>
</head>
<body>
    <?php
        $nav_style = "navbar navbar-expand-md navbar-dark bg-dark fixed-top";
        $nav_active = "recherche";
        include 'nav.php';
    ?>
    <main class="container pt-5">
        <div class="row mt-4">
            <div class="col-md-3 p-4 pb-3 pt-0 border-end h-100">
                <form action="recherche.php" method="GET">
                    <h3>Rechercher</h3>
                    <div class="mb-3">
                        <label for="nom"><h6>Nom :</h6></label>
                        <?php
                            echo '<input type="text" class="form-control" name="nom" id="nom" placeholder="ex : Sweat..."';
                            if(isset($_GET['nom'])){
                                echo ' value="' . $_GET['nom'] . '"';
                            }
                            echo '>';
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="motscles"><h6>Mots-clés :</h6></label>
                        <?php
                            echo '<input type="text" class="form-control" name="motscles" id="motscles" placeholder="ex : Coton..."';
                            if(isset($_GET['motscles'])){
                                echo ' value="' . $_GET['motscles'] . '"';
                            }
                            echo '>';
                        ?>
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
                                echo '<input type="checkbox" class="form-check-input" name="marque[]" value="' . strtolower($marque['marque']) . '" id="check-marq-' . strtolower($marque['marque']) . '"';
                                if(isset($_GET['marque']) && in_array(strtolower($marque['marque']),$_GET['marque'])){
                                    echo 'checked';
                                }
                                echo '>';
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
                                echo '<input type="checkbox" class="form-check-input" name="categorie[]" value="' . strtolower($categorie['categorie']) . '" id="check-cat-' . strtolower($categorie['categorie']) . '"';
                                if(isset($_GET['categorie']) && in_array(strtolower($categorie['categorie']),$_GET['categorie'])){
                                    echo 'checked';
                                }
                                echo '>';
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
                                echo '<input type="checkbox" class="form-check-input" name="couleur[]" value="' . strtolower($couleur['couleur']) . '" id="check-coul-' . strtolower($couleur['couleur']) . '"';
                                if(isset($_GET['couleur']) && in_array(strtolower($couleur['couleur']),$_GET['couleur'])){
                                    echo 'checked';
                                }
                                echo '>';
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

                        // Binding des paramètres et exécution :
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
                            echo '<b class="card-title">' . strtoupper($product['marque']) . ' ' . $product['nom'] . ' — ' . $product['categorie'] . '</b>';
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
