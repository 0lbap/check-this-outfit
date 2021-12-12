<?php echo '<nav class="' . $nav_style . '">'; ?>
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
                    <?php
                        if($nav_active == "index"){
                            echo '<a class="nav-link active" href="#">Accueil</a>';
                        } else {
                            echo '<a class="nav-link" href="index.php">Accueil</a>';
                        }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                        if($nav_active == "recherche"){
                            echo '<a class="nav-link active" href="#">Produits</a>';
                        } else {
                            echo '<a class="nav-link" href="recherche.php">Produits</a>';
                        }
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                        if($nav_active == "a_propos"){
                            echo '<a class="nav-link active" href="#">À propos</a>';
                        } else {
                            echo '<a class="nav-link" href="a_propos.php">À propos</a>';
                        }
                    ?>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <?php
                        if($nav_active == "panier"){
                            echo '<a class="nav-link active position-relative" href="#">';
                        } else {
                            echo '<a class="nav-link position-relative" href="panier.php">';
                        }
                    ?>
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