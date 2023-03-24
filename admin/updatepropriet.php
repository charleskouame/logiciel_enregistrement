
               <?php

               session_start();

               require_once "database.php";

               if(!empty($_GET["id_proprietaire"])) {
                  $id_proprietaire = checkInput($_GET['id_proprietaire']);
               } 
      

               $nomError = $prenomError = $imageError = $messageError = $emailError = $attestationError = $CPFError = $prixError = $ACDError = $date_echeanceError = $titre_de_proprieteError = $mandat_de_gestionError = $telephoneError = $nom = $prenom = $email = $titre_de_propriete = $ACD = $mandat_de_gestion = $CPF = $image =  $attestation = $date_echeance = $message = $prixError = $telephone = "";
               if(!empty($_POST)){
                  $nom = $_POST["nom"];
                  $prenom = $_POST["penom"];
                  $email = $_POST["email"];
                  
                  $image = $_FILES["image"]["name"];
                  $imagePath = '../images/'. basename($image);
                  $imageExtension  = pathinfo($imagePath,PATHINFO_EXTENSION); 

                  $telephone = $_POST["telephone"];
                  $CPF = $_POST["CPF"];
                  $prix = $_POST["prix"];
                  $message = $_POST["message"];
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

               if(empty($image)) // le input file est vide, ce qui signifie que l'image n'a pas ete update
            {
               $isImageUpdated = false;
            }
            else
            {
            $isImageUpdated = true;
            $isUploadSuccess =true;
            if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) 
            {
               $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
               $isUploadSuccess = false;
            }
            if(file_exists($imagePath)) 
            {
               $imageError = "Le fichier existe deja";
               $isUploadSuccess = false;
            }
            if($_FILES["image"]["size"] > 500000) 
            {
               $imageError = "Le fichier ne doit pas depasser les 500KB";
               $isUploadSuccess = false;
            }
            if($isUploadSuccess) 
            {
               if(!move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) 
           {
               $imageError = "Il y a eu une erreur lors de l'upload";
               $isUploadSuccess = false;
           } 
            } 
         }
         
         if (($succes && $isImageUpdated && $isUploadSuccess) || ($succes && !$isImageUpdated)) 
         { 
            $db = Database::connect();
         if($isImageUpdated)
         { 
            $statement = $db->prepare("UPDATE `proprietaire` SET `nom`= ?, `penom`= ?, `email`= ?, `telephone`= ?, `mandat_de_gestion`= ?, `titre_de_propriete`= ?, `date_echeance`= ?, `attestation`= ?, `ACD`= ?, `CPF`= ?, `prix`= ?, `message`= ?, `image`= ? WHERE `id_proprietaire` = ? ");
            $statement->execute(array($nom,$prenom,$email,$telephone,$mandat_de_gestion,$titre_de_propriete,$date_echeance,$attestation,$ACD,$CPF,$prix,$message,$image,$id_proprietaire,$image));
            }
         else
               {
              
               $statement = $db->prepare("UPDATE `proprietaire` SET `nom`= ?, `penom`= ?, `email`= ?, `telephone`= ?, `mandat_de_gestion`= ?, `titre_de_propriete`= ?, `date_echeance`= ?, `attestation`= ?, `ACD`= ?, `CPF`= ?, `prix`= ?, `message`= ?, `image`= ? WHERE `id_proprietaire` = ? ");
               $statement->execute(array($nom,$prenom,$email,$telephone,$mandat_de_gestion,$titre_de_propriete,$date_echeance,$attestation,$ACD,$CPF,$prix,$message,$image,$id_proprietaire));
          }
            Database::disconnect();
            header("Location: proprietaireint.php");
             }
             
             else if($isImageUpdated && !$isUploadSuccess)
                  {
                        $db = Database::connect();
                        $statement = $db->prepare("SELECT * FROM `proprietaire` where id_proprietaire = ? ");
                        $statement->execute(array($id_proprietaire));
                        $proprietaire = $statement->fetch();
                        $image = $proprietaire['image'];
                        Database::disconnect();
                                           
                  }
              }
               
               else {
                     $db = Database::connect();
                     $statement = $db->prepare("SELECT * FROM `proprietaire` where id_proprietaire = ? ");
                     $statement->execute(array($id_proprietaire));
                     $proprietaire = $statement->fetch();
                     $nom = $proprietaire["nom"];
                     $prenom = $proprietaire["penom"];
                     $email = $proprietaire["email"];
                     $telephone = $proprietaire["telephone"];
                     $CPF = $proprietaire["CPF"];
                     $prix = $proprietaire["prix"];
                     $message = $proprietaire["message"];
                     $ACD = $proprietaire["ACD"];
                     $date_echeance = $proprietaire["date_echeance"];
                     $titre_de_propriete = $proprietaire["titre_de_propriete"];
                     $mandat_de_gestion = $proprietaire["mandat_de_gestion"];
                     $attestation = $proprietaire["attestation"];  
                     Database::disconnect();
                  }
                  
                  function checkInput($data) 
                     {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                     }

                  ?>


                

               <!DOCTYPE html>
               <html>
               <head>
                  <title>Espace Propietaire</title>
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
               background-image: url(images/1440.jpg);
               background-size: cover;
               background-attachment: fixed;
               font-family: new time roman;
               }
               

               .get-in-touch {
               max-width: 800px;
               margin: 50px auto;
               position: relative;

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
               .contact-form .input-text {
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
               .contact-form .input-text:focus + .label,
               .contact-form .input-text.not-empty + .label {
               -webkit-transform: translateY(-24px);
                  transform: translateY(-24px);
               }
               .contact-form .label {
               position: absolute;
               left: 20px;
               bottom: 11px;
               font-size: 18px;
               line-height: 26px;
               font-weight: 400;
               color: #5543ca;
               cursor: text;
               transition: -webkit-transform .2s ease-in-out;
               transition: transform .2s ease-in-out;
               transition: transform .2s ease-in-out; 
               -webkit-transform .2s ease-in-out;
               }
               .contact-form .submit-btn {
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

               </style>
               </head>


            <body>
               <div class="container">
               <form class="contact-form row" role="form" action="<?php echo 'updatepropriet.php?id_proprietaire='.$id_proprietaire;?>"  method ="post" enctype="multipart/form-data">

               <div class="form-field col-lg-6">
               <input id="" class="input-text js-input" name="nom" type="text" value="<?php echo $nom; ?>" type="text" >
               <label class="label" for="nom">Nom</label>
               <p style="color:red;"><?php echo $nomError; ?></p>
                           </div>

               <div class="form-field col-lg-6">
               <input id="" class="input-text js-input" name="penom" value="<?php echo $prenom; ?>" type="text">
               <label class="label" for="penom">Prenom</label>
               <p style="color:red;"><?php echo $prenomError; ?></p>
               </div>

               <div class="form-field col-lg-6 ">
               <input id="email" class="input-text js-input" name="email" value="<?php echo $email; ?>" type="email">
               <label class="label" for="email">E-mail</label>
               <p style="color:red;"><?php echo $emailError; ?></p>
               </div>
               <div class="form-field col-lg-6 ">
               <input id="CPF" class="input-text js-input" name="CPF" value="<?php echo $CPF; ?>" type="varchar">
               <label class="label" for="CPF">CPF</label>
               <p style="color:red;"><?php echo $CPFError; ?></p>
               </div>
               <div class="form-field col-lg-6 ">
               <input id="prix" class="input-text js-input" name="prix" value="<?php echo $prix; ?>" type="varchar">
               <label class="label" for="prix">E-mail</label>
               <p style="color:red;"><?php echo $prixError; ?></p>
               </div>
              
               <div class="form-field col-lg-6 ">
               <input id="" class="input-text js-input" name="ACD" value="<?php echo $ACD; ?>" type="varchar">
               <label class="label" for="ACD">ACD</label>
               <p style="color:red;"><?php echo $ACDError; ?></p>
               </div>
               <div class="form-field col-lg-6 ">
               <input id="email" class="input-text js-input" name="date_echeance" value="<?php echo $date_echeance; ?>" type="date">
               <label class="label" for="date_echeance">date_echeance</label>
               <p style="color:red;"><?php echo $date_echeanceError; ?></p>
               </div>
               <div class="form-field col-lg-6 ">
               <input id="email" class="input-text js-input" name="titre_de_propriete" value="<?php echo $titre_de_propriete; ?>" type="varchar">
               <label class="label" for="titre_de_propriete">titre_de_propriete</label>
               <p style="color:red;"><?php echo $titre_de_proprieteError; ?></p>
               </div>
               <div class="form-field col-lg-6 ">
               <input id="email" class="input-text js-input" name="mandat_de_gestion" value="<?php echo $mandat_de_gestion; ?>" type="varchar">
               <label class="label" for="mandat_de_gestion">mandat de gestion</label>
               <p style="color:red;"><?php echo $mandat_de_gestionError; ?></p>
               </div>
              
              
               
               <div class="form-field col-lg-6 ">
               <input id="phone" class="input-text js-input" name="telephone" value="<?php echo $telephone; ?>" type="phone">
               <label class="label" for="phone">telephone</label>
               <p style="color:red;"><?php echo $telephoneError; ?></p>
               </div>
               
               <div class="form-field col-lg-6 ">
               <input id="attestation" class="input-text js-input" name="attestation" value="<?php echo $telephone; ?>" type="varchar">
               <label class="label" for="attestation">attestation</label>
               <p style="color:red;"><?php echo $attestationError; ?></p>
               </div>
                   
               <div class="col-md-6">
               <div class="form-group">
               <p style="color:red;"><?php echo $image; ?></p>
               <label for="image">Sélectionner une image:</label>
               <input type="file" class="form-control" id="image" name="image" placeholder="Uploader une image">
               <p style="color:red;"><?php echo $imageError; ?></p>
               </div>
               </div>

               <div class="col-md-6">
               <div class="form-group">
               <input id="message" class="input-text js-input" name="message" value="<?php echo $message; ?>" type="varchar">
               <textarea name="message" class="couleur" id="textMessage" cols="60" rows="3" class="form-control"  placeholder="entrer un message">
               </textarea>
               <p style="color:red;"><?php echo $messageError; ?></p>
               </div>
               </div>
            

               <div class="form-actions">
                   <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                   <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
              </div>


        </form>
        
   </div>
</body>
</html>
