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
  <div class="text-center">
    <h2>Se connecter</h2>
    <br><br>
    <form action="connexion.php" method="POST">
        <div><input class="input" type="email" name="email" id="email" placeholder="Votre email" required></div><br>
        <div><input class="input" type="password" name="password" id="pass" placeholder="Votre mot de passe" required></div><br><br>
        <div><input type="submit" name="connexion" id="creacompte" value="Confirmer"></div><br><br>
    </form>
    <?php
      $bdd_user="root";
      $bdd_password="root";
      try{
        $bdd = new PDO('mysql:host=localhost;dbname=projet_web', $bdd_user, $bdd_password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      } catch (Exception $e){
        echo "Erreur: ".$e;
      }
      $erreur="";
      if (isset($_POST['connexion'])){
        $email=$_POST['email'];
        $password=$_POST['password'];

        if(!empty($email) AND !empty($password)){
          $verifuser=$bdd->query("SELECT * FROM clients WHERE email='$email'");
          $userdata=$verifuser->fetch();
          if($verifuser->rowcount() == 1 && password_verify($password,$userdata['motDePasse'])){
            $_SESSION['email']=$userdata['email'];
            $_SESSION['prenom']=$userdata['prenom'];
            $_SESSION['nom']=$userdata['nom'];
            $_SESSION['adresse']=$userdata['adresse'];
            header('location:espaceClient.php');
          }else $erreur='<div class="alert alert-danger" role="alert">Identifiants incorrects</div>';
        }else $erreur='<div class="alert alert-warning" role="alert">Veuillez saisir tous les champs</div>';

        echo "$erreur";
      }
    ?>
    <p>Pas de compte ? <a href="inscription.php">Inscrivez-vous !</a></p><br><br>
    <a href="index.php">Retour à l'accueil</a>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

