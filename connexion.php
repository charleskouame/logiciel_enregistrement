<?php
session_start();

require_once('database.php');

$email = $motdepasse = $connexion_echoue = $emailError = $motdepasseError = $_SESSION["email"] = $_SESSION["motdepasse"] = "";

if(!empty($_POST)) {
   $_SESSION["email"] =  $_POST["email"];
   $_SESSION["motdepasse"] =  $_POST["motdepasse"];
   $success = true;

   if(empty($_SESSION["email"])) {
      $emailError = "champ email obligatoire";
      $success = false;
   }
   if(empty($_SESSION["motdepasse"])) {
      $motdepasseError = "champ mot de passe obligatoire";
      $success = false;
   }
   if($success) {
    $database = Database::connect();
    $resultat = $database->prepare("SELECT * FROM administrateur WHERE email = ? AND motdepasse = ?  ");
    $resultat->execute(array($_SESSION["email"], $_SESSION["motdepasse"]));
    $leresultat = $resultat->rowCount();
    if($leresultat != 0) {
      $_SESSION["autorisationAlaConnexion"] = true;
      
    $resultat_user = $database->prepare("SELECT * FROM administrateur WHERE email = ? AND motdepasse = ?  ");
    $resultat_user->execute(array($_SESSION["email"], $_SESSION["motdepasse"]));
    $leresultat_user = $resultat_user->fetch();
    $_SESSION["id_adminisrateur"] = $leresultat_user['id_admin'];
    $_SESSION["nom_administrateur"] = $leresultat_user['nom'];
    $_SESSION["prenom_administrateur"] = $leresultat_user['prenom'];
    $_SESSION["telephone_administrateur"] = $leresultat_user['telephone'];
    $_SESSION["adresse_administrateur"] = $leresultat_user['adresse'];


      header("location: admin.php");
    } 
    else {
      $connexion_echoue = "Votre email ou mot de passe inconnu";
      $_SESSION["email"] = "";
      $_SESSION["motdepasse"] = "";
    }
    Database::disconnect();
   }

}

?>

<!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/styles.css">
       

<style>

*{
     margin: 0px;
     padding: 0px;
   }
      
   body{
     background-image: url('images/gettyimages.jpg');
     background-size: cover;
     background-attachment: fixed;
     font-family: new time roman;
   }
 

.container{
  margin-top: 100px;
}
h2{
  text-align :center;
  color:#fff;
}
.form-control{
     background:transparent;
   }
   form{
    color: blue;
   }
   
.well{
  background: rgba('10,5,3,0.4');
  border: none;
  border-radius: 15px/15px;
  box-shadow: 0px 0px 50px 0px red;
  color:blue;
}
</style>

</head>
<body>
  
<h1 class="text-center" style="margin-top: 50px;">Connexion</h1>
<p style="color:green;">
  <?php 
   if(isset($_SESSION['inscriptionOK'])) {
      echo $_SESSION['inscriptionOK']; 
      $_SESSION['inscriptionOK'] = "";
   }
  ?>
</p>
<p style="color:red;"><?php echo $connexion_echoue; ?></p>

<div class="container col-lg-offset-2 col-lg-4  col-sm-4 col-sm-4">
  <div class="row">
    <div class="col-md-8 offset-3">

      <form  method="post" action="connexion.php" class="well">
        <div class="form-group">
          <label for="email">Adresse Email</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Adresse Email">
          <p style="color:red;"><?php echo $emailError ?></p>
        </div>
        <div class="form-group">
          <label for="motdepasse">Mot de passe</label>
          <input type="motdepasse" class="form-control" id="motdepasse" name="motdepasse" placeholder="Mot de passe">
          <p style="color:red;"><?php echo $motdepasseError ?></p>
        </div>
        
        <button type="submit" class="btn btn-primary">Connexion</button>
      </form>
      <h4>Pas encore inscris ? <a href="admin.php">Inscrivez-vous</a></h4>

    </div>
  </div>
</div>

<script src="js/jquery-3.6.0.slim.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>

