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
    <title>Projet Web</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div align='center'>
    <h2>S'inscrire</h2>
    <br><br>
    <form action="inscription.php" method="post">
        <div><input class="input" type="email" name="email" id="email" placeholder="Votre email" required></div><br>
        <div><input class="input" type="password" name="password" id="pass" placeholder="Votre mot de passe" minlength="8" required></div><br>
        <div><input class="input" type="password" name="passconfirm" id="passconfirm" placeholder="Confirmer votre mot de passe" minlength="8" required></div><br>
        <div><input class="input" type="text" name="nom" id="nom" placeholder="Votre nom" required></div><br>
        <div><input class="input" type="text" name="prenom" id="prenom" placeholder="Votre prénom" required></div><br>
        <!-- <div><input class="input" type="text" id="datenaiss" name="datenaiss"placeholder="Votre date de naissance" onfocus="(this.type='date')" min="1900-01-01" max="2021-12-31" required></div><br> -->
        <div><input class="input" type="text" name="ville" id="ville" placeholder="Votre ville" required></div><br>
        <div><input class="input" type="text" name="adresse" id="adresse" placeholder="Votre adresse" required></div><br>
        <div><input class="input" type="tel" name="telephone" id="tel" placeholder="Votre n° de téléphone" minlength="10" maxlength="10" required></div><br><br>
        <div><input type="submit" name="creacompte" id="creacompte" value="Let's go !"></div><br><br>
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
      if(isset($_POST['creacompte'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $passconfirm=$_POST['passconfirm'];
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $ville=$_POST['ville'];
        $adresse=$_POST['adresse'];
        $telephone=$_POST['telephone'];

        if(!empty($email) AND !empty($password) AND !empty($passconfirm) AND !empty($nom) AND !empty($prenom) AND !empty($ville) AND !empty($adresse) AND !empty($telephone)){
          if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            if($password==$passconfirm){
              $reqmail = $bdd->query('SELECT email FROM clients WHERE email="'.$email.'"');
              if($reqmail->rowcount() == 0){
                $password = password_hash($password,PASSWORD_DEFAULT);
                $insertmbr = $bdd->query("INSERT INTO clients (email,motDePasse,nom,prenom,ville,adresse,telephone) VALUES ('$email','$password','$nom','$prenom','$ville','$adresse','$telephone')");
                echo '<p class="p-3 bg-success text-white">Compte créé ! Vous allez être redirigé...</p>';
                // ATTENTION : ERREUR LORS DE LA CRÉATION D'UN COMPTE AVEC UN CHAMP COMPORTANT UNE APOSTROPHE !
                header("refresh:3; url=connexion.php");
              }else $erreur="Adresse mail déjà utilisée :(";
            }else $erreur="Vos mots de passe ne correspondent pas :(";
          }else $erreur="Veuillez saisir une adresse valide";
        }else $erreur="Veuillez saisir tous les champs";

        echo "$erreur";
      }
    ?>
    <p>Déjà inscris ? <a href="connexion.php">Connecte-toi !</a></p><br><br>
    <a href="index.php">Retour à l'accueil</a>
  </div>
</body>
</html>
