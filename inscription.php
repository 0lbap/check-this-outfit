<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    if(isset($_SESSION['user'])){
        header('location:index.php');
    }

    include 'bdd.php';

    $erreur="";
    if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['passconfirm'])&& isset($_POST['ville']) && isset($_POST['adresse']) && isset($_POST['telephone'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $passconfirm=$_POST['passconfirm'];
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $ville=$_POST['ville'];
        $adresse=$_POST['adresse'];
        $telephone=$_POST['telephone'];
        if(!empty($email) && !empty($password) && !empty($passconfirm) && !empty($nom) && !empty($prenom) && !empty($ville) && !empty($adresse) && !empty($telephone)){
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                if(strlen($password)>=8){
                    if($password==$passconfirm){
                        $reqmail = $bdd->prepare('SELECT email FROM Clients WHERE email = ?');
                        $reqmail-> execute(array($email));
                        if($reqmail->rowcount() == 0){
                            $password = password_hash($password,PASSWORD_DEFAULT);
                            $insertmbr = $bdd->prepare('INSERT INTO Clients (email,motDePasse,nom,prenom,ville,adresse,telephone) VALUES(?,?,?,?,?,?,?)');
                            $insertmbr->execute(array($email,$password,$nom,$prenom,$ville,$adresse,$telephone));
                            ob_start();
                            echo '<div class="alert alert-success" role="alert">Compte créé ! Vous allez être redirigé...</div>';
                            header('refresh:3; url=connexion.php');
                            ob_end_flush();
                        } else $erreur="Adresse mail déjà utilisée";
                    } else $erreur="Vos mots de passe ne correspondent pas";
                } else $erreur="Le mot de passe doit faire plus de 8 carractères";
            } else $erreur="Veuillez saisir une adresse mail valide";
        } else $erreur="Veuillez saisir tous les champs";
        if(!empty($erreur)){
            echo '<div class="alert alert-danger" role="alert">'.$erreur.'</div>';
        }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Inscription | check-this-outfit</title>
</head>
<body>
    <main class="container">
        <div class="row justify-content-center">
            <div class="card col-md-10 col-lg-8 p-4 mt-sm-3 shadow">
                <form class="row" action="inscription.php" method="POST">
                    <h2 class="mb-3 fw-light">Inscription</h2>
                    <div class="col-sm-6 mb-3">
                        <div class="row m-0">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control rounded-pill" id="nom" name="nom" placeholder="Delacroix">
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="row m-0">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control rounded-pill" id="prenom" name="prenom" placeholder="Eugène">
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="row m-0">
                            <label for="email" class="form-label">Adresse email</label>
                            <input type="email" class="form-control rounded-pill" id="email" name="email" placeholder="nom@example.com">
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="row m-0">
                            <label for="telephone" class="form-label">Numéro de téléphone</label>
                            <input type="tel" class="form-control rounded-pill" id="telephone" name="telephone" minlength="10" maxlength="10" pattern="[0-9]{10}" placeholder="0123456789">
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row m-0">
                            <label for="password" class="form-label">Nouveau mot de passe</label>
                            <input type="password" class="form-control rounded-pill" id="password" name="password" placeholder="•••••••• (8 carractères minimum)">
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <div class="row m-0">
                            <label for="passconfirm" class="form-label">Confirmer le mot de passe</label>
                            <input type="password" class="form-control rounded-pill" id="passconfirm" name="passconfirm" placeholder="••••••••">
                        </div>
                    </div>
                    <div class="col-sm-8 mb-3">
                        <div class="row m-0">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control rounded-pill" id="adresse" name="adresse" placeholder="6, rue de Furstenberg">
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3">
                        <div class="row m-0">
                            <label for="ville" class="form-label">Ville</label>
                            <input type="text" class="form-control rounded-pill" id="ville" name="ville" placeholder="Paris">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row m-0 mt-4 mb-4">
                            <button type="submit" class="btn btn-dark rounded-pill">Confirmer</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div>
                    <p>Déjà inscris ? <a href="connexion.php" class="link-secondary">Connectez-vous !</a></p>
                    <a href="index.php" class="link-secondary">Retour à l'accueil</a>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
