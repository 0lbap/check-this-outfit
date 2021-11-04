<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Projet Web</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div align='center'>
    <h2>Se connecter</h2>
    <br><br>
    <form action="connexion.php" method="POST">
        <div><input class="input" type="email" name="email" id="email" placeholder="Votre email" required></div><br>
        <div><input class="input" type="password" name="password" id="pass" placeholder="Votre mot de passe" required></div><br><br>
        <div><input type="submit" name="connexion" id="creacompte" value="Let's go !"></div><br><br>
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
          }else $erreur='<p class="p-3 bg-danger text-white">Identifiants incorrects</p>';
        }else $erreur='<p class="p-3 bg-warning text-white">Veuillez saisir tous les champs</p>';

        echo "$erreur";
      }
    ?>
    <p>Pas de compte ? <a href="inscription.php">Inscris-toi !</a></p><br><br>
    <a href="index.php">Retour à l'accueil</a>
  </div>
</body>
</html>

