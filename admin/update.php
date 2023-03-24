<?php
     
    include ('database.php');
    
     if(!empty($_GET['id_client'])){
        $id = checkInput($_GET['id_client']);
     }

     $nomError = $prenomError = $categoryError = $id_conditionError = $relenceError = $id_clientError = $entrerError = $bailError = $localisationError = $prixError = $fonctionError  = $imageError = $choixError = $id_condition = $etatError = $prix = $fonction = $bail  = $entrer = $category = $relence = $prenom = $nom = $condition = $id_client = $localisation = $image = $choix = $etat = "";

    if(!empty($_POST)) 
    {
        @$nom = checkInput($_POST['nom']);
        @$prenom = checkInput($_POST['prenom']);
        @$prix = checkInput($_POST['prix']);
        @$id_condition = checkInput($_POST['id_condition']);
        @$relence  = checkInput($_POST['relence']);
        @$fonction = checkInput($_POST['fonction']);
        @$entrer = checkInput($_POST['entrer']);
        @$choix = checkInput($_POST['choix']);
        @$id_client  = checkInput($_POST['id_client']);
        @$etat = checkInput($_POST['etat']);
        @$localisation = checkInput($_POST['localisation']); 
        @$image  = checkInput($_FILES["image"]["nom"]);
        @$imagePath  = '../images/' . basename($image);
        $imageExtension = pathinfo($imagePath,PATHINFO_EXTENSION);
        $isSuccess = true;
       
        if(empty($nom)) 
        {
            $nomError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(empty($bail)) 
        {
            $bailError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        if(empty($relence)) 
        {
            $relenceError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        if(empty($prix)) 
        {
            $prixError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
          
        if(empty($entrer)) 
        {
            $entrerError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 


        if(empty($choix)) 
        {
            $choixError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        
        if(empty($id_condition)) 
        {
            $id_conditionError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 

        if(empty($id_client)) 
        {
            $id_clientError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        
        if(empty($category)) 
        {
            $categoryError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
         
         
        if(empty($etat)) 
        {
            $etatError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        if(empty($fonction)) 
        {
            $fonctionError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        if(empty($localisation)) 
        {
            $localisationError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        
        if(empty($prenom)) 
        {
            $prenomError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        if(empty($image)) 
        {
            $isImageUpdated = false;
        }
        else
        {
            $isImageUpdated = true;
            $isUploadSuccess = true;
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
        
        if(($isSuccess && $isImageUpdated && $isUploadSuccess) || ($isSuccess && !$isImageUpdated)) 
        {

            $db = Database::connect();
            if($isImageUpdated)
            {
                $statement = $db->prepare("UPDATE locataire_client set id_client = ?, id_admin = ?, nom = ?, fonction = ?, bail = ?, maison = ?, prix_maison = ?, état_des_lieux = ?, entrer = ?, relance = ?, localisation = ?, image = ?");
                $statement->execute(array($nom, $relence, $prix, $id_condition, $id_admin, $localisation, $fonction, $entrer, $bail, $choix, $maison, $id_client, $etat, $image));
            } else 
    
            {
                $statement = $db->prepare("UPDATE locataire_client set id_client = ?, id_admin = ?, nom = ?, fonction = ?, bail = ?, maison = ?, prix_maison = ?, état_des_lieux = ?, entrer = ?, relance = ?, localisation = ?");
                $statement->execute(array($nom, $relence, $prix, $id_condition, $id_admin, $localisation, $fonction, $entrer, $bail, $choix, $maison, $id_client, $etat));
            }
            Database::disconnect();
            header("Location:index.php");   
           
        }
        else if($isImageUpdated && !$isUploadSuccess)
        {
            $db = Database::connect();
            $statement = $db->prepare("SELECT image FROM locataire_client where id_client = ?");
            $statement->execute(array($id_client));
            $locataire_client = $statement->fetch();
            $image          = $locataire_client['image'];
            Database::disconnect();
           
        }
    }
    
        else 
          {
        @$db = Database::connect();
        @$statement = $db->prepare("SELECT * FROM locataire_client where id_client = ?");
        @$statement->execute(array($id_client));
        @$locataire_client = $statement->fetch();
        @$nom           = $locataire_client['nom'];
        @$description    = $locataire_client['description'];
        @$prix          = $locataire_client['prix'];
        @$relence       = $locataire_client['relence'];
        @$image          = $locataire_client['image'];
        @$id_condition           = $locataire_client['id_condition'];
        @$entrer    = $locataire_client['entrer'];
        @$choix          = $locataire_client['choix'];
        @$id_client       = $locataire_client['id_client'];
        @$etat          = $locataire_client['etat'];
        @$localisation          = $locataire_client['localisation'];
        @$maison          = $locataire_client['maison'];
        @$bail          = $locataire_client['bail'];
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
        <title>logiciel immobiliere</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <body>
        <h1 class="text-logo text-center "> GESTIONNAIRE IMMOBILIERE </h1>
         <div class="container admin">
            <div class="row">
                <div class="col-sm-6">
                    <h1><strong>Modifier un client</strong></h1>
                    <br>
                    <form class="form" action="<?php echo 'update.php?id=' . $id_client; ?>" role="form" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?php echo $nom; ?>">
                        <span class="help-inline"><?php echo $nomError; ?></span>
                    </div>
                   

                    <div class="form-group">
                        <label for="id_client">id_client</label>
                        <input type="" class="form-control" id="id_client" name="id_client" placeholder="creer un identifiant client" value="<?php echo $id_client; ?>">
                        <span class="help-inline"><?php echo $id_clientError; ?></span>
                    </div>

                    <div class="form-group">
                        <label for="fonction">Fonction:</label>
                        <input type="text" class="form-control" id="fonction" name="fonction" placeholder="fonction" value="<?php echo $fonction; ?>">
                        <span class="help-inline"><?php echo $fonctionError; ?></span>
                    </div>

                     <div class="form-group">
                       <label for="bail">Contrat de bail:</label>
                       <input type="text" class="form-control" id="bail" name="bail" placeholder="Contrat de bail" value="<?php echo $bail; ?>">
                     <span class="help-inline"><?php echo $bailError; ?></span>
                   </div>
 

                    <div class="form-group">
                        <label for="description">type de maison choisi:</label>
                        <input type="text" class="form-control" id="type de maison choisi" name="type de maison choisi" placeholder="type de maison choisi" value="<?php echo $choix; ?>">
                        <span class="help-inline"><?php echo $choixError; ?></span>
                    </div>
                    

                    <div class="form-group">
                        <label for="price">Prix de la maison: (en €)</label>
                        <input type="number" step="0.01" class="form-control" id="prix" name="prix" placeholder="Prix" value="<?php echo $prix; ?>">
                        <span class="help-inline"><?php echo $prixError; ?></span>
                    </div>

                     
                    <div class="form-group">
                        <label for="etat">état des lieux :</label>
                        <input type="text" class="form-control" id="l'état des lieux " name="l'état des lieux " placeholder="l'état des lieux " value="<?php echo $etat; ?>">
                        <span class="help-inline"><?php echo $etatError; ?></span>
                    </div>
                    
                      
                    <div class="form-group">
                        <label for="entrer">entrer:</label>
                        <input type="date" class="form-control" id="entrer" name="date d'entrer " placeholder="date d'entrer " value="<?php echo $entrer; ?>">
                        <span class="help-inline"><?php echo $entrerError; ?></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="entrer">relance:</label>
                        <input type="date" class="form-control" id="relance " name="relance" placeholder="relance " value="<?php echo $relance; ?>">
                        <span class="help-inline"><?php echo $relenceError; ?></span>
                    </div> 

                    
                    <div class="form-group">
                        <label for="entrer">localisation:</label>
                        <input type="text" class="form-control" id="geographie " name="localisation" placeholder=" localisation " value="<?php echo $localisation; ?>">
                        <span class="help-inline"><?php echo $localisationError; ?></span>
                    </div>
                  
                    
                    <div class="form-group">
                        <label for="entrer">id_condition:</label>
                        <input type="text" class="form-control" id="id_condition" name="id_condition" placeholder=" id_condition " value="<?php echo $id_condition; ?>">
                        <span class="help-inline"><?php echo $id_conditionError; ?></span>
                    </div>
                       
                    
                
        
                        <div class="form-group">
                            <label for="category">Catégorie:
                            <select class="form-control" id="category" nom = "category">
                            <?php
                               $db = Database::connect();
                               foreach ($db->query('SELECT * FROM categories') as $row) 
                               {
                                    if($row['id'] == $category)
                                        echo '<option selected="selected" value="'. $row['id'] .'">'. $row['nom'] . '</option>';
                                    else
                                        echo '<option value="'. $row['id'] .'">'. $row['nom'] . '</option>';
                               }
                               Database::disconnect();
                            ?>
                            </select>
                            <span class="help-inline"><?php echo $categoryError; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <p><?php echo $image; ?></p>
                            <label for="image">Sélectionner une nouvelle image:</label>
                            <input type="file" id="image" name="image"> 
                            <span class="help-inline"><?php echo $imageError; ?></span>
                        </div>
                        <br>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Modifier</button>
                            <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                       </div>
                    </form>
                </div>
                <div class="col-sm-6 site">
                    <div class="thumbnail">
                        <img src="<?php echo '../images/'.$image; ?>" alt="...">
                        <div class="prix"><?php echo number_format((float)$prix, 2, '.', ''). ' €';?></div>
                          <div class="caption">
                            <h4><?php echo $nom; ?></h4>
                           
                            <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span></a>
                          </div>
                    </div>
                </div>
            </div>
        </div>   
    </body>
</html>