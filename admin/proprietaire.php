
<?php
session_start();

 include "database.php";

$nomError = $prenomError = $imageError = $messageError =  $emailError = $attestationError = $CPFError = $prixError = $ACDError = $date_echeanceError = $titre_de_proprieteError = $mandat_de_gestionError = $telephoneError = $nom = $prenom = $email = $titre_de_propriete = $ACD = $mandat_de_gestion = $CPF = $image =  $attestation = $date_echeance = $message = $prixError = $telephone = "";

if(!empty($_POST)) {
   
    $nom = $_POST["nom"];
    $prenom = $_POST["penom"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];
    $CPF = $_POST["CPF"];
    $prix = $_POST["prix"];
    $message = $_POST["message"];
    $image = $_FILES["image"]["name"];
    $imagePath = 'images/'. basename($image);
    $imageExtension = pathinfo($imagePath,PATHINFO_EXTENSION);    
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

   if(empty($message)) {
      $messageError = "Ce champ est requis";
      $succes = false;
   }


   if(empty($titre_de_propriete)) {
      $titre_de_proprieteError = "Ce champ est requis";
      $succes = false;
   }

       if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" && $imageExtension != "pdf"  ) {
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
        $statement = $db->prepare("INSERT INTO `proprietaire`(`nom`, `penom`, `email`, `telephone`, `mandat_de_gestion`, `titre_de_propriete`, `date_echeance`, `attestation`, `ACD`, `CPF`, `prix`, `message`, `image`)  VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $statement->execute(array($nom, $prenom, $email, $telephone, $mandat_de_gestion, $titre_de_propriete, $date_echeance, $attestation, $ACD, $CPF, $prix, $message, $image));
        Database::disconnect();
        $_SESSION['inscriptionOK'] = "Felicitations, inscription effectuee avec succes veuillez vous connectez.";
        header("Location: proprietaireint.php");
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
      overflow: hidden;
        min-height: 100vh;
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
      position: relative;
      margin: 0px;
      width: 150px;
      border-radius: 0px;
      font-size: 19px;
      margin-left:120px;
      margin-bottom: 100px;
      box-shadow: 1px 4px 10px orange;
      margin-top:20px ;
     
   }
   
   .option {
     color: gray;
   }
   .x{
     position: relative;
     color: blue;
     bottom: -25px;
     right: 10px;
     margin-left: -90px;
    
   }

   .y{
     position: relative;
     color: blue;
     bottom: -25px;
     margin-left: -110px;
     right: 10px;
    
   }
   
   .couleur{
     margin-left:90px;
     color: blueviolet; 
     border: 5px solid  #73C2FB;
     border-radius: 10px;
    
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
      .bnt{
         display: flex;
         justify-content: space-evenly;
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
                      <p style="color:red;"><?php echo $prixError; ?></p>

                      <div class="form-group">
                      <input type="file" class="form-control" id="image" name="image" placeholder="Uploader un fichier">
                      <p style="color:red;"><?php echo $imageError; ?></p>
                      </div>

                     <textarea name="message" class="couleur" id="textMessage" cols="60" rows="3" class="form-control"  placeholder="entrer un message"></textarea>
                      <p style="color:red;"><?php echo $messageError; ?></p>
                        
      
                      <div class="bnt">
                       <a href="#" class="x"><button type="submit" class="btn btn-primary btn btn-info">ENREGISTREZ</button></a>    
                       <a href="proprietaireint.php" class="y"><button type="submit" class="btn btn-primary btn btn-info">Retour</button></a>
                      </div>

                     </div>
          </div>
          </form>
              
        </div>
    </body>
    </html>
