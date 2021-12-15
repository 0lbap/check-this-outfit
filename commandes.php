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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Commandes | check-this-outfit</title>
</head>
<body>
    <?php
        $nav_style = "navbar navbar-expand-sm navbar-dark bg-dark fixed-top";
        $nav_active = "commandes";
        include 'nav.php';
    ?>
    <main class="container pt-5">
        <div class="row p-4">
            <?php
                if(!isset($_SESSION['user'])){
                    echo '<div class="alert alert-info">Connectez-vous pour voir vos commandes. <a class="alert-link" href="connexion.php">Connexion</a></div>';
                    die();
                }
                $email = $_SESSION['user']['email'];
                
                $getcommandes=$bdd->prepare("SELECT *,DATE_FORMAT(dateCommande, '%d/%m/%Y') as dateCommandeF FROM Commandes WHERE email=? ORDER BY dateCommande DESC");
                $getcommandes->execute(array($email));
                $commandesdata=$getcommandes->fetchAll();

                if($getcommandes->rowcount()==0){
                    echo '<div class="alert alert-info">Vous n\'avez pas encore passé de commandes. <a class="alert-link" href="panier.php">Voir mon panier</a></div>';
                    die();
                }
            ?>
            <h3 class="display-6 mb-4 mt-3">Vos commandes</h3>
                <?php
                    foreach($commandesdata as $commande){
                        echo '<div class="card shadow p-4 mb-5">';
                        echo '<table class="table">';
                        echo '<tr>';
                        if($commande['etat'] == "Livré"){
                            $couleur = "success";
                        } else {
                            $couleur = "warning";
                        }
                        echo '<th class="col-3 table-' . $couleur . '">N° de commande #139085' . $commande['idCommande'] . '</th>';
                        echo '<th class="col-6 table-' . $couleur . '">Commandé le ' . $commande['dateCommandeF'] . '</th>';
                        echo '<th class="col-2 table-' . $couleur . '">' . $commande['etat'] . '</th>';
                        echo '</tr>';

                        $getlignescommandes=$bdd->prepare("SELECT * FROM Lignescommandes,Produits WHERE Lignescommandes.idProduit = Produits.idProduit AND idCommande=?");
                        $getlignescommandes->execute(array($commande['idCommande']));
                        $lignescommandesdata=$getlignescommandes->fetchAll();

                        foreach($lignescommandesdata as $lignecommande){
                            echo '<tr>';
                            echo '<td class="col-3"><img src="' . $lignecommande['photo'] . '" class="col-8 img-fluid d-none d-md-block"></td>';
                            echo '<td class="col-6">x' . $lignecommande['quantite'] . ' ' . $lignecommande['marque'] . ' - ' . $lignecommande['nom'] . '</td>';
                            echo '<td class="col-4">Montant : ' . $lignecommande['montant'] . '€</td>';
                            echo '</tr>';
                        }

                        echo '</table>';
                        echo '</div>';
                    }
                ?>
        </div>
    </main>
</body>
</html>
