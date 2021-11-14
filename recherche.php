<?php session_start(); ?>
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
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
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
        <div class="row">
            <div class="col-3 mg-3">
                <h4>Rechercher</h4>
                <form>
                    <div class="form-group">
                        <label for="motclef">Mot-clef</label>
                        <input type="text" class="form-control" id="motclef" aria-describedby="motclef" placeholder="Entrez un mot-clef">
                    </div>
                    <p>Marques :</p>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Apple</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Samsung</label>
                    </div>
                    <p>Catégories :</p>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck3">
                        <label class="form-check-label" for="exampleCheck3">Téléphone</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck4">
                        <label class="form-check-label" for="exampleCheck4">Ordinateur</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                </form>
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="card col-3 m-3">
                        <img class="card-img-top" src="https://via.placeholder.com/300x180.png?text=Image+du+produit" alt="">
                        <div class="card-body">
                            <h5>Article</h5>
                            <p>Prix</p>
                            <a href="#" class="btn btn-primary disabled">Détails</a><span class="text-danger"> Indisponible</span>
                        </div>
                    </div>
                    <div class="card col-3 m-3">
                        <img class="card-img-top" src="https://via.placeholder.com/300x180.png?text=Image+du+produit" alt="">
                        <div class="card-body">
                            <h5>Article</h5>
                            <p>Prix</p>
                            <a href="#" class="btn btn-primary">Détails</a>
                        </div>
                    </div>
                    <div class="card col-3 m-3">
                        <img class="card-img-top" src="https://via.placeholder.com/300x180.png?text=Image+du+produit" alt="">
                        <div class="card-body">
                            <h5>Article</h5>
                            <p>Prix</p>
                            <a href="#" class="btn btn-primary">Détails</a><span class="text-success"> Offre spéciale</span>
                        </div>
                    </div>
                    <div class="card col-3 m-3">
                        <img class="card-img-top" src="https://via.placeholder.com/300x180.png?text=Image+du+produit" alt="">
                        <div class="card-body">
                            <h5>Article</h5>
                            <p>Prix</p>
                            <a href="#" class="btn btn-primary">Détails</a>
                        </div>
                    </div>
                    <div class="card col-3 m-3">
                        <img class="card-img-top" src="https://via.placeholder.com/300x180.png?text=Image+du+produit" alt="">
                        <div class="card-body">
                            <h5>Article</h5>
                            <p>Prix</p>
                            <a href="#" class="btn btn-primary">Détails</a>
                        </div>
                    </div>
                    <div class="card col-3 m-3">
                        <img class="card-img-top" src="https://via.placeholder.com/300x180.png?text=Image+du+produit" alt="">
                        <div class="card-body">
                            <h5>Article</h5>
                            <p>Prix</p>
                            <a href="#" class="btn btn-primary">Détails</a>
                        </div>
                    </div>
                    <div class="card col-3 m-3">
                        <img class="card-img-top" src="https://via.placeholder.com/300x180.png?text=Image+du+produit" alt="">
                        <div class="card-body">
                            <h5>Article</h5>
                            <p>Prix</p>
                            <a href="#" class="btn btn-primary">Détails</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
