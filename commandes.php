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
    <title>Commandes • Projet Web</title>
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
                        <a class="nav-link" href="recherche.php">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="a_propos.php">À propos</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
    <main class="container pt-5">
        <div class="row p-4">
            <?php
                if(!isset($_SESSION['user'])){
                    echo '<div class="alert alert-primary">Connectez-vous pour voir vos commandes. <a class="alert-link" href="connexion.php">Connexion</a></div>';
                    die();
                }
                $email = $_SESSION['user']['email'];

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
                
                $getcommandes=$bdd->prepare("SELECT *,DATE_FORMAT(dateCommande, '%d/%m/%Y') as dateCommandeF FROM Lignescommandes,Commandes,Produits WHERE Lignescommandes.idCommande = Commandes.idCommande AND Lignescommandes.idProduit = Produits.idProduit AND email=? ORDER BY dateCommande DESC");
                $getcommandes->execute(array($email));
                $commandesdata=$getcommandes->fetch();

                if($getcommandes->rowcount()==0){
                    echo '<div class="alert alert-primary">Vous n\'avez pas encore passé de commandes. <a class="alert-link" href="panier.php">Voir mon panier</a></div>';
                    die();
                }

                var_dump($commandesdata);
            ?>
            <h2 class="pb-4 pt-3">Vos commandes</h2>
            <table class="table table-striped table-hover">
                <tr>
                    <th>Numéro de commande</th>
                    <th>Articles</th>
                    <th>Montant total</th>
                    <th>Commandé le</th>
                    <th>État</th>
                </tr>
                <?php
                    for($i=0;$i<$getcommandes->rowcount();$i++){
                        echo '<tr>';
                        echo '<td>' . $commandesdata['idCommande'] . '</td>';
                        echo '<td>x' . $commandesdata['quantite'] . ' ' . $commandesdata['marque'] . ' ' . $commandesdata['nom'] . '</td>';
                        echo '<td>' . $commandesdata['montant'] . '€</td>';
                        echo '<td>' . $commandesdata['dateCommandeF'] . '</td>';
                        echo '<td>' . $commandesdata['etat'] . '</td>';
                        echo '</tr>';
                    }
                ?>
            </table>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
