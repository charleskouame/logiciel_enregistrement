<?php
session_start();

include "database.php";

$nomError = $prenomError = $imageError = $emailError = $pdfError = $fonctionError = $type_de_maison_choisiError = $Contact_numberError = $contrat_de_bailError = $etat_des_lieuxError = $date_de_relanceError = $prix_de_la_maisonError = $date_entrerError = $date_de_sortirError =  $situation_geographique_de_la_maisonError = $nom = $prenom = $email = $Contact_number = $contrat_de_bail = $date_de_sortir = $etat_des_lieux = $date_de_relance = $fonction = $prix_de_la_maison = $date_entrer = $image = $type_de_maison_choisi = $pdf =  $situation_geographique_de_la_maison = "";

if(!empty($_POST)) { 
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $fonction = $_POST["fonction"];

    $image = $_FILES["image"]["name"];
    $imagePath = 'images/'. basename($image);
    $imageExtension  = pathinfo($imagePath,PATHINFO_EXTENSION); 
    
    $Contact_number = $_POST["Contact_number"];
    $contrat_de_bail = $_POST["contrat_de_bail"];
    $etat_des_lieux = $_POST["etat_des_lieux"];
    $date_de_relance = $_POST["date_de_relance"];
    $prix_de_la_maison = $_POST["prix_de_la_maison"];
    $date_entrer = $_POST["date_entrer"];
    $date_de_sortir = $_POST["date_de_sortir"];
    $type_de_maison_choisi = $_POST["type_de_maison_choisi"];  
    $situation_geographique_de_la_maison = $_POST["situation_geographique_de_la_maison"];
    
    $succes = true;
  
    if(empty($nom)) {
      $nomError = "Ce champ nom est requis";
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

     
     if(empty($fonction)) {
      $fonctionError = "Ce champ est requis";
      $succes = false;
      }

     if(empty($Contact_number)) {
      $Contact_numberError = "Ce champ est requis";
      $succes = false;
      }

      if(empty($situation_geographique_de_la_maison)) {
         $situation_geographique_de_la_maisonError = "Ce champ est requis";
         $succes = false;
      }

     if(empty($contrat_de_bail)) {
        $contrat_de_bailError = "Ce champ est requis";
        $succes = false;
     }
     if(empty($etat_des_lieux)) {
      $etat_des_lieuxError = "Ce champ est requis";
        $succes = false;
     }
     
     if(empty($date_de_relance)) {
        $date_de_relanceError = "Ce champ est requis";
        $succes = false;
     }
     if(empty($prix_de_la_maison)) {
      $prix_de_la_maisonError = "Ce champ est requis";
      $succes = false;
   }

   if(empty($date_entrer)) {
      $date_entrerError = "Ce champ est requis";
      $succes = false;
   }
   if(empty($date_de_sortir)) {
      $date_de_sortirError = "Ce champ est requis";
      $succes = false;
   }

   if(empty($type_de_maison_choisi)) {
      $type_de_maison_choisiError = "Ce champ est requis";
      $succes = false;
   }

   if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" && $imageExtension != "pdf" ) {
      $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif, .pdf";
      $succes = false;
}
if(file_exists($imagePath)) {
      $imageError = "Le fichier existe deja";
      $succes = false;
}
if($_FILES["image"]["size"] > 5000000) {
      $imageError = "Le fichier ne doit pas depasser les 5MB";
      $succes = false;
}
if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath))
  {
          $imageError = "Il y a eu une erreur lors de l'upload";
          $isUploadSuccess = false;
  }
   
     if($succes){
        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO `locataire_client`(`nom`, `prenom`, `fonction`, `email`, `Contact_number`, `contrat_de_bail`, `type_de_maison_choisi`, `prix_de_la_maison`, `etat_des_lieux`, `date_entrer`, `date_de_sortir`, `date_de_relance`, `situation_geographique_de_la_maison`, `image`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $statement->execute(array($nom, $prenom, $fonction, $email, $Contact_number, $contrat_de_bail, $type_de_maison_choisi, $prix_de_la_maison, $etat_des_lieux, $date_entrer, $date_de_sortir, $date_de_relance, $situation_geographique_de_la_maison, $image));
        Database::disconnect();
        $_SESSION['inscriptionOK'] = "Felicitations, inscription effectuee avec succes veuillez vous connectez.";
        header("Location: index.php");
     }

}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Espace administrateur</title>
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
     box-sizing: border-box;
   }

   body{
      overflow: hidden;
        min-height: 100vh;
     background-image: url(images/1440.jpg);
     background-size: cover;
     background-attachment: fixed;
     font-family: new time roman;
   }
      

   .get-in-touch{
      max-width: 800px;
      margin: 50px auto;
      position: relative;

     }

     .idn .form-field{
      position: absolute;
        display: flex;
        padding-top: 750px;
       position: absolute;
       justify-content: center;
       
     }
     .idn{
      position: absolute;
        display: flex;
       margin-left: 300px;
       
     }
     .sbn{
       position: relative;
       display:flex;
       justify-content: space-evenly;
       padding: 20px;
       margin-right: -310px;
       margin-top: -25px;

     }
.get-in-touch .title {
  text-align: center;
  text-transform: uppercase;
  letter-spacing: 3px;
  font-size: 3.2em;
  line-height: 48px;
  padding-bottom: 48px;
     color: #5543ca;
    background: #5543ca;
    background: -moz-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
    background: -webkit-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
    background: linear-gradient(to right,#f4524d  0%,#5543ca  100%) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
}

.contact-form .form-field {
  position: relative;
  margin: 32px 0;
}
.contact-form .input-text{
  display: block;
  width: 100%;
  height: 36px;
  border-width: 0 0 2px 0;
  border-color: #5543ca;
  font-size: 18px;
  line-height: 26px;
  font-weight: 400;
}
.contact-form .input-text:focus {
  outline: none;
}

.contact-form .label{
  position: absolute;
  left: 20px;
  font-size: 18px;
  line-height: 26px;
  font-weight: 400;
  color: #5543ca;
  cursor: text;
  transition: -webkit-transform .2s ease-in-out;
  transition: transform .2s ease-in-out;
  transition: transform .2s ease-in-out, 
  -webkit-transform .2s ease-in-out;
}

.contact-form .submit-btn {
   position: absolute;
  display: inline-block;
  background-color: #000;
   background-image: linear-gradient(125deg,#a72879,#064497);
  color: #fff;
  text-transform: uppercase;
  letter-spacing: 2px;
  font-size: 16px;
  padding: 8px 16px;
  border: none;
  width:200px;
  cursor: pointer;

}

a{
   width: 200px;
   margin-right:-140px;
}
.submit-btn{
margin-top:-3px;
 margin-right:-5px;
 height: 45px;
 border-radius: 10px


}
.title{
margin-top: -30px;
}

   </style>
    </head>                 
    
    <body>
    <section class="get-in-touch">
   <h1 class="title">Espace Clients</h1>
   <form class="contact-form row" action="formclient.php" method="POST" enctype="multipart/form-data">
  
     <div class="form-field col-lg-6">
         <input id="" class="input-text js-input" name="nom" type="text">
         <label class="label" for="nom">Nom</label>
         <p style="color:red;"><?php echo $nomError; ?></p>
      </div>

      <div class="form-field col-lg-6">
         <input id="" class="input-text js-input" name="prenom" type="text">
         <label class="label" for="prenom">Prenom</label>
         <p style="color:red;"><?php echo $prenomError; ?></p>
      </div>
      
      <div class="form-field col-lg-6 ">
         <input id="email" class="input-text js-input" name="email"  type="email">
         <label class="label" for="email">E-mail</label>
         <p style="color:red;"><?php echo $emailError; ?></p>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="company" class="input-text js-input" name="fonction" type="varchar" >
         <label class="label" for="fonction">Fonction</label>
         <p style="color:red;"><?php echo $fonctionError; ?></p>
      </div>
       <div class="form-field col-lg-6 ">
         <input id="phone" class="input-text js-input" name="contrat_de_bail" type="varchar">
         <label class="label" for="contrat_de_bail">contrat de bail</label>
         <p style="color:red;"><?php echo $contrat_de_bailError; ?></p>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="phone" class="input-text js-input" name="Contact_number" type="phone">
         <label class="label" for="phone">Contact number</label>
         <p style="color:red;"><?php echo $Contact_numberError; ?></p>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="phone" class="input-text js-input" name="type_de_maison_choisi" type="text">
         <label class="label" for="type_de_maison_choisi">type_de_maison_choisi</label>
         <p style="color:red;"><?php echo $type_de_maison_choisiError; ?></p>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="phone" class="input-text js-input" name="prix_de_la_maison" type="text">
         <label class="label" for="prix_de_la_maison">prix de la maison</label>
         <p style="color:red;"><?php echo $prix_de_la_maisonError; ?></p>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="phone" class="input-text js-input" name="etat_des_lieux" type="text">
         <label class="label" for="etat_des_lieux">etat des lieux</label>
         <p style="color:red;"><?php echo $etat_des_lieuxError; ?></p>
      </div>

      <div class="form-field col-lg-6 ">
         <input id="phone" class="input-text js-input" name="date_entrer" type="date">
         <label class="label" for="date_entrer">date entrer</label>
         <p style="color:red;"><?php echo $date_entrerError; ?></p>
      </div>

      <div class="form-field col-lg-6 ">
         <input id="phone" class="input-text js-input" name="date_de_sortir" type="date">
         <label class="label" for="date_de_sortir">date de sortir</label>
         <p style="color:red;"><?php echo $date_de_sortirError; ?></p>
      </div>

      <div class="form-field col-lg-6 ">
         <input id="varchar" name="date_de_relance" class="input-text js-input" type="date">
         <label class="label" for="date_de_relance">date de relance</label>
         <p style="color:red;"><?php echo $date_de_relanceError; ?></p>
      </div>

         <div class="col-md-6">
            <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image" placeholder="Uploader une image">
            <p style="color:red;"><?php echo $imageError; ?></p>
            </div>
         </div>

      <div class="form-field col-lg-6 ">
         <input id="varchar" class="input-text js-input" type="varchar" name="situation_geographique_de_la_maison">
         <label class="label" for="situation_geographique_de_la_maison">situation geographique de la maison</label>
         <p style="color:red;"><?php echo $situation_geographique_de_la_maisonError; ?></p>
      </div>
       <div class="idn">
         <div class="form-field ">
            <input class="submit-btn" role="button" type="submit" value="Submit">
            <h1 class="sbn"><a href="../admin/index.php" class="btn btn-success btn-lg">Retour</a></h1>
         </div>
       </div>
   </form>
</section>
    echo getcwd();
    </body>

    </html>
