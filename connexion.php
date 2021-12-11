<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    if(isset($_SESSION['user'])){
        header('location:index.php');
    }

    include 'bdd.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Connexion • Projet Web</title>
</head>
<body class="connexion-screen">
    <main class="container">
        <div class="row">
            <div class="card col-sm-8 col-md-6 col-lg-4 p-4 position-absolute top-50 start-50 translate-middle shadow">
                <form action="connexion.php" method="POST">
                    <h2 class="mb-3 fw-light">Connexion</h2>
                    <div class="row mb-3 m-0">
                        <label for="email" class="form-label">Adresse email</label>
                        <input type="email" class="form-control rounded-pill" id="email" name="email" placeholder="nom@example.com">
                    </div>
                    <div class="row mb-3 m-0">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control rounded-pill" id="password" name="password" placeholder="••••••••">
                    </div>
                    <div class="row m-0 mt-4 mb-4">
                        <button type="submit" class="btn btn-dark rounded-pill">Confirmer</button>
                    </div>
                </form>
                <?php
                    $erreur="";
                    if(isset($_POST['email']) && isset($_POST['password'])){
                        $emailconnect=htmlspecialchars($_POST['email']);
                        $passwordconnect=$_POST['password'];
                        if(!empty($emailconnect) && !empty($passwordconnect)){
                            $verifuser=$bdd->prepare("SELECT * FROM clients WHERE email= ?");
                            $verifuser->execute(array($emailconnect));
                            $userdata=$verifuser->fetch();
                            if($verifuser->rowcount() == 1 && password_verify($passwordconnect,$userdata['motDePasse'])){
                                $_SESSION['user']=$userdata;
                                header('location:index.php');
                            } else $erreur='<div class="alert alert-danger" role="alert">Identifiant ou mot de passe incorrect</div>';
                        } else $erreur='<div class="alert alert-warning" role="alert">Veuillez saisir tous les champs</div>';

                        echo "$erreur";
                    }
                ?>
                <hr>
                <div>
                    <p>Pas de compte ? <a href="inscription.php" class="link-secondary">Inscrivez-vous !</a></p>
                    <a href="index.php" class="link-secondary">Retour à l'accueil</a>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </main>
</body>
</html>
