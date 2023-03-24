
               <?php

               session_start();

               require_once "database.php";

               if(!empty($_GET["id_admin"])) {
                  $id_admin = checkInput($_GET['id_admin']);
               } 

               $nomError = $prenomError = $imageError = $emailError = $motdepasseError = $adresseError = $telephoneError = $imageError  = $nom = $prenom = $email = $motdepasse = $adresse = $telephone = $image = "";
               if(!empty($_POST)){
               $nom = $_POST["nom"];
               $prenom = $_POST["penom"];
               $email = $_POST["email"];
               $motdepasse = $_POST["motdepasse"];
               $adresse = $_POST["adresse"];
               $telephone = $_POST["telephone"];
               $image = $_FILES["image"]["name"];
               $imagePath = '../images/'. basename($image);
               $imageExtension  = pathinfo($imagePath,PATHINFO_EXTENSION); 
               
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


               if(empty($motdepasse)) {
               $motdepasseError = "Ce champ est requis";
               $succes = false;
               }

               if(empty($adresse)) {
               $adresseError = "Ce champ est requis";
               $succes = false;
               }
               if(empty($telephone)) {
                  $telephoneError = "Ce champ est requis";
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
                  $statement = $db->prepare("UPDATE `administrateur` SET `id_admin`= ?, `nom`= ?, `prenom`= ?, `email`= ?, `motdepasse`= ?, `adresse`= ?, `telephone`= ?, `image`= ? WHERE  `id_admin` = ? ");
                  $statement->execute(array($nom,$prenom,$email,$motdepasse,$adresse,$telephone,$image));
                  }
               else
                     {
                        
                        $statement = $db->prepare("UPDATE `administrateur` SET `id_admin`= ?, `nom`= ?, `prenom`= ?, `email`= ?, `motdepasse`= ?, `adresse`= ?, `telephone`= ?, `image`= ? WHERE  `id_admin` = ?  ");
                        $statement->execute(array($nom,$prenom,$email,$motdepasse,$adresse,$telephone,$image));
                        }
                     Database::disconnect();
                     header("Location: index.php");
                     }
                     
                     else if($isImageUpdated && !$isUploadSuccess)
                           {
                                 $db = Database::connect();
                                 $statement = $db->prepare("SELECT * FROM `administrateur` where id_admin = ? ");
                                 $statement->execute(array($id_admin));
                                 $administrateur = $statement->fetch();
                                 $image = $administrateur['image'];
                                 Database::disconnect();
                                                   
                           }
                        }
                        
                        else {
                              $db = Database::connect();
                              $statement = $db->prepare("SELECT * FROM `administrateur` where id_admin = ? ");
                              $statement->execute(array($id_admin));
                              $administrateur = $statement->fetch();
                              $nom = $administrateur["nom"];
                              $prenom = $administrateur["prenom"];
                              $email = $administrateur["email"];
                              $adresse = $administrateur["adresse"];
                              $telephone = $administrateur["telephone"];
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
               <form class="contact-form row" role="form" action="<?php echo 'updateadmin.php?id_admin='.$id_admin;?>"  method ="post" enctype="multipart/form-data">

               <div class="form-field col-lg-6">
               <input id="" class="input-text js-input" name="nom" type="text" value="<?php echo $nom; ?>" type="text" >
               <label class="label" for="nom">Nom</label>
               <p style="color:red;"><?php echo $nomError; ?></p>
               </div>

               <div class="form-field col-lg-6">
               <input id="" class="input-text js-input" name="penom" value="<?php echo $prenom; ?>" type="text">
               <label class="label" for="prenom">Prenom</label>
               <p style="color:red;"><?php echo $prenomError; ?></p>
               </div>

               <div class="form-field col-lg-6 ">
               <input id="email" class="input-text js-input" name="email" value="<?php echo $email; ?>" type="email">
               <label class="label" for="email">E-mail</label>
               <p style="color:red;"><?php echo $emailError; ?></p>
               </div>
               <div class="form-field col-lg-6 ">
               <input id="company" class="input-text js-input" name="adresse" value="<?php echo $adresse; ?>" type="varchar" >
               <label class="label" for="adresse">Adresse</label>
               <p style="color:red;"><?php echo $adresseError; ?></p>
               </div>
              
               <div class="form-field col-lg-6 ">
               <input id="phone" class="input-text js-input" name="motdepasse" value="<?php echo $motdepasse; ?>" type="password">
               <label class="label" for="motdepasse">Mot de passe</label>
               <p style="color:red;"><?php echo $motdepasseError; ?></p>
               </div>
               <div class="form-field col-lg-6 ">
               <input id="phone" class="input-text js-input" name="telephone" value="<?php echo $telephone; ?>" type="phone">
               <label class="label" for="phone">telephone</label>
               <p style="color:red;"><?php echo $telephoneError; ?></p>
               </div>

                   
               <div class="col-md-6">
               <div class="form-group">
              
               <p style="color:red;"><?php echo $image;?></p>
                   <label for="image">Sélectionner une image:</label>
               <input type="file" class="form-control" id_admin="image" name="image" placeholder="Uploader une image">
               <p style="color:red;"><?php echo $imageError; ?></p>
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
