<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Projet Web</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Projet Web</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="recherche.php">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">A propos</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Votre compte
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Panier</a></li>
                        <li><a class="dropdown-item" href="#">Commandes</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="deconnexion.php">Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <main>
        <h2 class="text-center title">Bienvenue sur Projet Web.</h2>
        <div class="row">
            <div class="cardcontainer">
                <div class="card col-3 border-0 infocard" id="ic1">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-truck"><rect x="1" y="3" width="15" height="13"></rect><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon><circle cx="5.5" cy="18.5" r="2.5"></circle><circle cx="18.5" cy="18.5" r="2.5"></circle></svg>
                    <div class="card-body">
                        <h5>Livraison rapide</h5>
                        <p>Nos livraisons sont parmis les plus sûres et les plus rapides du marché. En effet, près de 90% de nos clients en sont satifsait !</p>
                    </div>
                </div>
                <div class="card col-3 border-0 infocard" id="ic2">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    <div class="card-body">
                        <h5>Produits de qualité</h5>
                        <p>Nos produits sont neufs et achettés dirrectement à l'usine. De plus, ils sont transportés par nos transporteurs certifiés, ce qui réduit le risque de produits défectueux.</p>
                    </div>
                </div>
                <div class="card col-3 border-0 infocard" id="ic3">
                <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                    <div class="card-body">
                        <h5>Service après vente</h5>
                        <p>Vous n'êtes pas satifsait par un produit acheté chez nous ? Ce n'est pas grave, vous avez 2 mois pour le renvoyer et ainsi bénéficier d'un coupon de réduction !</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="text-center">
                <h2 id="discoverh">Prêt à essayer ?</h2>
                <a href="recherche.php" class="btn btn-primary" id="discoverbtn">Découvrez nos produits !</a>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
