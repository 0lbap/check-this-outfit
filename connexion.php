<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion • Projet Web</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="row">
    <div class="col-sm-2 col-md-3 col-lg-4"></div>
    <div class="col-sm-8 col-md-6 col-lg-4 p-4">
      <form action="connexion.php" method="POST">
        <h2 class="mb-3">Connexion</h2>
        <div class="mb-3">
          <label for="email" class="form-label">Adresse email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="nom@example.com">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Mot de passe</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="••••••••">
        </div>
        <button type="submit" class="btn btn-primary">Confirmer</button>
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
        if (isset($_POST['email']) && isset($_POST['password'])){
          $emailconnect=htmlspecialchars($_POST['email']);
          $passwordconnect=$_POST['password'];

          if(!empty($emailconnect) AND !empty($passwordconnect)){
            $verifuser=$bdd->prepare("SELECT * FROM clients WHERE email= ?");
            $verifuser->execute(array($emailconnect));
            $userdata=$verifuser->fetch();
            if($verifuser->rowcount() == 1 && password_verify($passwordconnect,$userdata['motDePasse'])){
              $_SESSION['email']=$userdata['email'];
              $_SESSION['prenom']=$userdata['prenom'];
              $_SESSION['nom']=$userdata['nom'];
              $_SESSION['adresse']=$userdata['adresse'];
              header('location:index.php?email=".$_SESSION["email"]');
            }else $erreur='<div class="alert alert-danger" role="alert">Identifiants incorrects</div>';
          }else $erreur='<div class="alert alert-warning" role="alert">Veuillez saisir tous les champs</div>';

          echo "$erreur";
        }
      ?>
      <p>Pas de compte ? <a href="inscription.php">Inscrivez-vous !</a></p>
      <a href="index.php">Retour à l'accueil</a>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
