<?php
  session_start();
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  if (isset($_SESSION['email'])){
    header('location:index.php');
  }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription • Projet Web</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <main class="container">
    <div class="row">
      <div class="col-md-2 col-lg-3"></div>
      <div class="col-md-8 col-lg-6 p-4">
        <form class="row" action="inscription.php" method="POST">
          <h2 class="mb-3">Inscription</h2>
          <div class="col-sm-6 mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Delacroix">
          </div>
          <div class="col-sm-6 mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Eugène">
          </div>
          <div class="col-sm-6 mb-3">
            <label for="email" class="form-label">Adresse email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="nom@example.com">
          </div>
          <div class="col-sm-6 mb-3">
            <label for="telephone" class="form-label">Numéro de téléphone</label>
            <input type="tel" class="form-control" id="telephone" name="telephone" minlength="10" maxlength="10" pattern="[0-9]{10}" placeholder="0123456789">
          </div>
          <div class="col-12 mb-3">
            <label for="password" class="form-label">Nouveau mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="•••••••• (8 carractères minimum)">
          </div>
          <div class="col-12 mb-3">
            <label for="passconfirm" class="form-label">Confirmer le mot de passe</label>
            <input type="password" class="form-control" id="passconfirm" name="passconfirm" placeholder="••••••••">
            <div class="col-12">
            <div class="col-sm-8 mb-3">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="6, rue de Furstenberg">
          </div>
          <div class="col-sm-4 mb-3">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" placeholder="Paris">
          </div>
            <button type="submit" class="btn btn-primary rounded-pill">Confirmer</button>
          </div>
  
        </form>
        <br>
        <?php
          $bdd_user="root";
          $bdd_password="";
          try 
          {
              $bdd = new PDO("mysql:host=localhost;dbname=projet_web;charset=utf8", "$bdd_user", "$bdd_password");
          }
          catch(PDOException $e)
          {
              die('Erreur : '.$e->getMessage());
          }
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

            if(!empty($email) AND !empty($password) AND !empty($passconfirm) AND !empty($nom) AND !empty($prenom)AND !empty($ville) AND !empty($adresse) AND !empty($telephone)){
              if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                if(strlen($password)>=8){
                  if($password==$passconfirm){
                    $reqmail = $bdd->prepare('SELECT email FROM clients WHERE email = ?');
                    $reqmail-> execute(array($email));
                    if($reqmail->rowcount() == 0){
                      $password = password_hash($password,PASSWORD_DEFAULT);
                      $insertmbr = $bdd->prepare('INSERT INTO clients (email,motDePasse,nom,prenom,ville,adresse,telephone) VALUES(?,?,?,?,?,?,?)');
                      $insertmbr->execute(array($email,$password,$nom,$prenom,$ville,$adresse,$telephone));
                      echo '<div class="alert alert-success" role="alert">Compte créé ! Vous allez être redirigé...</div>';
                      header('refresh:3; url=connexion.php');
                    }else $erreur="Adresse mail déjà utilisée";
                  }else $erreur="Vos mots de passe ne correspondent pas";
                }else $erreur="Le mot de passe doit faire plus de 8 carractères";
              }else $erreur="Veuillez saisir une adresse mail valide";
            }else $erreur="Veuillez saisir tous les champs";

            if(!empty($erreur)){
              echo '<div class="alert alert-danger" role="alert">'.$erreur.'</div>';
            }
          }
        ?>
        <p>Déjà inscris ? <a href="connexion.php">Connectez-vous !</a></p>
        <a href="index.php">Retour à l'accueil</a>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
