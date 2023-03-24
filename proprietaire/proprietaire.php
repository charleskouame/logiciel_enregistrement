
<?php
session_start();

 include "database.php";

$nomError = $prenomError = $emailError = $attestationError = $CPFError = $prixError = $ACDError = $adresseError = $date_echeanceError = $titre_de_proprieteError = $mandat_de_gestionError = $telephoneError = $nom = $prenom = $email = $titre_de_propriete = $ACD = $mandat_de_gestion = $CPF = $attestation = $date_echeance = $telephone = "";

if(!empty($_POST)) {   
    $nom = $_POST["nom"];
    $prenom = $_POST["penom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $CPF = $_POST["CPF"];
    $prix = $_POST["prix"];
    $ACD = $_POST["ACD"];
    $date_echeance = $_POST["date_echeance"];
    $titre_de_propriete = $_POST["titre_de_propriete"];
    $mandat_de_gestion = $_POST["mandat_de_gestion"];
    $attestation = $_POST["attestation"];  
    $succes = true;

    
    if(empty($nom)) {
      $nomError = "Ce champ nom est requis";
      $succes = false;
      }

    if(empty($attestation)) {
      $attestationError = "Ce champ est requis";
      $succes = false;
      }

    if(empty($prenom)) {
        $prenomError = "Ce champ est requis";
        $succes = false;
     }
  
     if(empty($email)) {
        $emailError = "Ce champ est requis";
        $succes = false;
     }
     if(empty($CPF)) {
      $CPFError = "Ce champ est requis";
        $succes = false;
     }
     
     if(empty($telephone)) {
        $telephoneError = "Ce champ est requis";


        $succes = false;
     }
     if(empty($prix)) {
      $prixError = "Ce champ est requis";
      
      $succes = false;
   }

   if(empty( $ACD)) {
      $ACDError = "Ce champ est requis";
      $succes = false;
   }

   if(empty($date_echeance)) {
      $date_echeanceError = "Ce champ est requis";
      $succes = false;
   }
 
   if(empty($mandat_de_gestion)) {
      $mandat_de_gestionError = "Ce champ est requis";
      $succes = false;
   }


   if(empty($titre_de_propriete)) {
      $titre_de_proprieteError = "Ce champ est requis";
      $succes = false;
   }
     if($succes){
        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO `proprietaire`(`id_proprietaire`, `nom`, `penom`, `email`, `telephone`, `mandat_de_gestion`, `titre_de_propriete`, `date_echeance`, `attestation`, `ACD`, `CPF`, `prix`)  VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $statement->execute(array($id_proprietaire, $nom, $prenom, $email, $telephone, $mandat_de_gestion, $titre_de_propriete, $date_echeance, $attestation, $ACD, $CPF, $prix));
        Database::disconnect();
        $_SESSION['inscriptionOK'] = "Felicitations, inscription effectuee avec succes veuillez vous connectez.";
        header("Location: index.php");
     }

}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Espace Proprietaie</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/styles.css">
       
      <style type="text/css">
   *{
     margin: 0px;
     padding: 0px;
   }
      
   body{
     background-image: url(images/1440.jpg);
     background-size: cover;
     background-attachment: fixed;
     font-family: new time roman;
   }

   h1{
     font-size: 30px;
     color:white;
   }
   .glyphicon{
     font-size:50px;
     color:blue;
     border:0px solid lightblue;
     padding:40px;
     border-radius:100px;
     margin-left:330px;
     
   }

   img{
    width: 4vw;
    height: 6vh;
    max-width: 100px;
    max-height: 100px;
    margin-top: 10px;
    
   }
   img-responsive .centree {
     margin: 0 auto;
   }
   .form-control{
     background: transparent;
     border-radius: 0px;
     margin-top: 10px;
     border: 0px;
     border-bottom: 1px solid lightblue;
     font-family: new time roman;
     font-size: 20px;
    color: white;
   }
   .btn-info{
      margin-top: 30px;
      width: 500px;
      border-radius: 0px;
      font-size: 19px;
      margin-left:120px;
      margin-bottom: 100px;
      box-shadow: 1px 4px 10px orange;
   }
   
   .option{
     color: gray;
   }
   .x{
    color: blue;
    margin: 0 auto;
   }
   .text-center {
    color: orange;
   }
   .col-md-6{
      box-shadow: -1px 1px 50px 10px blue inset;
      margin-top: 60px;
      border-radius: 20px 0px 50px 0px;
      background: rgba(0,0,0,0.5);
   }
      </style>
    </head>
    
    
    <body>
        <div class="container">
          <form action="proprietaire.php" method="POST" enctype="multipart/form-data">
          <div class="row">
              <div class="col-md-3"></div>
                 <div class="col-md-6">
                 <h1 class="text-center">PROPRIETAIRE</h1>
                 <span class="glyphicon"><img  class="img-responsive center-block" src="images/unnamed(5).jpg" alt=""></span>
                        
                      <input type="text" class="form-control" name="nom" placeholder="nom">
                      <p style="color:red;"><?php echo $nomError; ?></p> 

                      <input type="text" class="form-control" name="penom" placeholder="prenom">
                      <p style="color:red;"><?php echo $prenomError; ?></p> 

                      <input type="email" class="form-control" name="email" placeholder="email">
                      <p style="color:red;"><?php  echo $emailError; ?></p>


                      <input type="varchar" class="form-control" name="mandat_de_gestion" placeholder="mandat de gestion">
                      <p style="color:red;"><?php echo $mandat_de_gestionError; ?></p>

                      <input type="telephone" class="form-control" name="telephone" placeholder="telephone">
                      <p style="color:red;"><?php  echo $telephoneError; ?></p>


                      <input type="varchar" class="form-control" name="titre_de_propriete" placeholder="titre de propriete">
                      <p style="color:red;"><?php echo $titre_de_proprieteError; ?></p>

                      <input type="date" class="form-control" name="date_echeance" placeholder="date echeance">
                      <p style="color:red;"><?php echo $date_echeanceError; ?></p>

                      <input type="varchar" class="form-control" name="attestation" placeholder="attestation">
                      <p style="color:red;"><?php echo $attestationError; ?></p>

                      <input type="varchar" class="form-control" name="ACD" placeholder="ACD">
                      <p style="color:red;"><?php echo $ACDError; ?></p>

                      <input type="varchar" class="form-control" name="CPF" placeholder="CPF">
                      <p style="color:red;"><?php echo $CPFError; ?></p>
              
                      <input type="varchar" class="form-control" name="prix" placeholder="prix de la maison">
                      <p style="color:red;"><?php echo $prixError; ?>

                      <div class="col-md-6">
                     <div class="form-group">
                  
                     <p style="color:red;"><?php echo $image; ?></p>
                     <label for="image">Sélectionner une image:</label>
                     <input type="file" class="form-control" id_proprietaire="image" name="image" placeholder="Uploader une image">
                    
                     </div>
                     </div>

              </div>
          </div>
          </form>
        </div>
    </body>
    </html>
