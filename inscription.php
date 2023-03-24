<?php
session_start();

require_once "database.php";

$nomError = $prenomsError = $emailError = $motdepasseError = $adresseError = $telephoneError = $nom = $prenoms = $email = $motdepasse = $adresse = $telephone = "";

if(!empty($_POST)) {
   
    $nom = $_POST["nom"];
    $prenoms = $_POST["prenoms"];
    $email = $_POST["email"];
    $motdepasse = $_POST["motdepasse"];
    $adresse = $_POST["adresse"];
    $telephone = $_POST["telephone"];

    $succes = true;

    if(empty($nom)) {
       $nomError = "Ce champ nom est requis";
       $succes = false;
    }
    if(empty($prenoms)) {
        $prenomsError = "Ce champ nom est requis";
        $succes = false;
     }
     if(empty($email)) {
        $emailError = "Ce champ nom est requis";
        $succes = false;
     }
     if(empty($motdepasse)) {
        $motdepasseError = "Ce champ nom est requis";
        $succes = false;
     }
     if(empty($adresse)) {
        $adresseError = "Ce champ nom est requis";
        $succes = false;
     }
     if(empty($telephone)) {
        $telephoneError = "Ce champ nom est requis";
        $succes = false;
     }

     if($succes) {
        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO utilisateurs (nom, prenoms, email, motdepasse, adresse, telephone, role, statut, date) 
        values(?, ?, ?, ?, ?, ?, 'utilisateur', 'actif', NOW())");
        $statement->execute(array($nom,$prenoms,$email,$motdepasse,$adresse,$telephone));
        Database::disconnect();
        $_SESSION['inscriptionOK'] = "Felicitations, inscription effectuée avec succes veuillez vous connectez.";
        header("Location: connexion.php");
     }




}



?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Inscription</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  
</head>
<body>
    <!-- L'ENTETE -->
  <?php require_once("menu.php"); ?>
<!-- FIN DE L'ENTETE -->

<h1 class="text-center" style="margin-top: 50px;">Inscription</h1>

<div class="container">
  <div class="row">
    <div class="col-md-8 offset-2">

      <form method="post" action="inscription.php">
      <div class="row">
         <div class="col-md-6">
            <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
            <p style="color:red;"><?php echo $nomError; ?></p> 
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-group">
            <label for="prenoms">Prenoms</label>
            <input type="text" class="form-control" id="prenoms" name="prenoms" placeholder="Prenoms">
            <p style="color:red;"><?php echo $prenomsError; ?></p> 
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-md-6">
            <div class="form-group">
            <label for="email">Adresse Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Adresse Email">
            <p style="color:red;"><?php  echo $emailError ?></p>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-group">
            <label for="motdepasse">Mot de passe</label>
            <input type="password" class="form-control" id="motdepasse" name="motdepasse" placeholder="Mot de passe">
            <p style="color:red;"><?php  echo $motdepasseError ?></p>
            </div>
         </div>
      </div>


      <div class="row">
         <div class="col-md-6">
            <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse">
            <p style="color:red;"><?php echo $adresseError; ?></p>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Téléphone">
            <p style="color:red;"><?php  echo $telephoneError ?></p>
            </div>
         </div>
      </div>
        
        <button type="submit" class="btn btn-primary">Inscription</button>
      </form>

    </div>
  </div>
</div>

<script src="js/jquery-3.6.0.slim.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>

