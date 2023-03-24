<?php 
      include 'database.php';
    
   //limite de la base de donnée//

     

    $nomError = $categoryError = $mailError = $mail = $maisonError = $etatError = $id_conditionError = $relanceError = $id_clientError = $entrerError = $bailError = $localisationError = $prixError = $fonctionError  = $imageError = $choixError = $id_condition = $prix = $fonction = $bail  = $entrer = $category = $relance = $nom = $id_condition = $id_client = $mail = $localisation = $image = $maison = $etat = "";

    if(isset($_POST)) 
    {
        $id_client  = htmlspecialchars($_POST['id_client']);
        $nom = htmlspecialchars($_POST['nom']);
        $fonction = htmlspecialchars($_POST['fonction']);
        $bail = htmlspecialchars($_POST['bail']);
        $isSuccess = true;
        $isUploadSuccess = false;
    
  

        if(isset($nom)) 
        {
            $nomError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        if(isset($bail)) 
        {
            $bailError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
         

        if(isset($id_client)) 
        {
            $id_clientError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        if(isset($fonction)) 
        {
            $fonctionError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
    }
?>
   
    <?php 


          if($isSuccess) 
          {
            include 'database.php';
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO `locataire_client`(`id_admin`, `nom`, `fonction`, `mail`, `bail`, `maison`, `prix_maison`, `état_des_lieux`, `entrer`, `relance`, `localisation`, `image`) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $statement->execute(array($nom, $prix, $id_condition, $relence, $maison, $mail, $fonction, $entrer, $choix, $id_client, $etat, $localisation, $image));  
            
        }
    
    ?>




<?php
    if(isset($_POST)) 
    {

        $prix = htmlspecialchars($_POST['prix']);
        $id_condition = htmlspecialchars($_POST['id_condition']);
        $relance  = htmlspecialchars($_POST['relance']);
        $mail  = htmlspecialchars($_POST['mail']);
        $entrer = htmlspecialchars($_POST['entrer']);
        $maison = htmlspecialchars($_POST['maison']);
        $etat = htmlspecialchars($_POST['etat']);
        $localisation = htmlspecialchars($_POST['localisation']); 
        $image  = htmlspecialchars($_FILES["image"]["name"]);
        $imagePath  = '../image/' . basename($image);
        $imageExtension = pathinfo($imagePath,PATHINFO_EXTENSION);
        $isSuccess = true;
        $isUploadSuccess = false;

       

        if(isset($relance)) 
        {
            $relanceError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
        
        if(isset($prix)) 
        {
            $prixError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 

        
        if(isset($mail)) 
        {
            $mailError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 
          
        if(isset($entrer)) 
        {
            $entrerError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 

        if(isset($id_condition)) 
        {
            $id_conditionError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        } 

        if(isset($id_client)) 
        {
            $id_clientError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
         
         
        if(isset($etat)) 
        {
            $etatError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        if(isset($fonction)) 
        {
            $fonctionError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        if(isset($localisation)) 
        {
            $localisationError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
        
        if(isset($maison)) 
        {
            $maisonError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }

        if(isset($image)) 
        {
            $imageError = 'Ce champ ne peut pas être vide';
            $isSuccess = false;
        }
    } 
?>  
    <?php    
        if($isSuccess) 
        {   include 'database.php';
            $db = Database::connect();
            $statement = $db->prepare("INSERT INTO `locataire_client`(`id_admin`, `nom`, `fonction`, `mail`, `bail`, `maison`, `prix_maison`, `état_des_lieux`, `entrer`, `relance`, `localisation`, `image`) VALUES(:id_admin, :nom, :fonction, :mail, :bail, :maison, :prix_maison, :état_des_lieux, :entrer, :relance, :localisation, :image)");
            $statement->execute(array($nom, $prix, $id_condition, $relence, $maison, $fonction, $entrer, $choix, $id_client, $etat, $localisation, $image)); 
            header("Location: index.php");
                        
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
        <h1 class="text-logo text-center">GESTIONNAIRE IMMOBILIERE </h1>
         <div class="container admin">
            <div class="row">
                <h1><strong>Ajouter un client</strong></h1>
                <br>
                <form class="form" role="form" action="insert.php"  method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" value="<?php echo  $nom ?>">
                        <span class="help-inline"><?php echo $nomError ?></span>
                    </div>
                   
                    <div class="form-group">
                        <label for="mail">mail</label>
                        <input type="" class="form-control" id="mail" name="mail" placeholder="Ajouter votre mail" value="<?php echo  $mail ?>">
                        <span class="help-inline"><?php echo $mailError ?></span>
                    </div>

                    <div class="form-group">
                        <label for="id_client">id_client</label>
                        <input type="" class="form-control" id="id_client" name="id_client" placeholder="creer un identifiant client" value="<?php echo  $id_client ?>">
                        <span class="help-inline"><?php echo $id_clientError ?></span>
                    </div>

                    <div class="form-group">
                        <label for="fonction">Fonction:</label>
                        <input type="text" class="form-control" id="fonction" name="fonction" placeholder="fonction" value="<?php echo  $fonction ?>">
                        <span class="help-inline"><?php echo $fonctionError ?></span>
                    </div>

                    
                    <div class="form-group">
                       <label for="bail">Contrat de bail:</label>
                       <input type="text" class="form-control" id="bail" name="bail" placeholder="Contrat de bail" value="<?php echo  $bail ?>">
                     <span class="help-inline"><?php echo $bailError ?></span>
                    </div>
 

                    <div class="form-group">
                        <label for="maison">type de maison choisi:</label>
                        <input type="text" class="form-control" id="maison" name="maison" placeholder="type de maison choisi" value="<?php echo $maison ?>">
                        <span class="help-inline"><?php echo $maisonError ?></span>
                    </div>
                    

                    <div class="form-group">
                        <label for="prix">Prix de la maison: (en €)</label>
                        <input type="number" step="0.01" class="form-control" id="prix" name="prix" placeholder="Prix" value="<?php echo  $prix ?>">
                        <span class="help-inline"><?php echo $prixError ?></span>
                    </div>

                     
                    <div class="form-group">
                        <label for="état_des_lieux">état des lieux:</label>
                        <input type="text" class="form-control" id="etat " name="etat" placeholder="l'état des lieux " value="<?php echo $etat ?>">
                        <span class="help-inline"><?php echo $etatError ?></span>
                    </div>
                    
                      
                    <div class="form-group">
                        <label for="entrer">entrer:</label>
                        <input type="date" class="form-control" id="entrer" name="entrer" placeholder="date d'entrer " value="<?php echo  $entrer ?>">
                        <span class="help-inline"><?php echo $entrerError ?></span>
                    </div>
                    
                    <div class="form-group">
                        <label for="entrer">relance:</label>
                        <input type="date" class="form-control" id="relance " name="relance" placeholder="relance " value="<?php echo $relance ?>">
                        <span class="help-inline"><?php echo $relanceError ?></span>
                    </div> 

                    
                    <div class="form-group">
                        <label for="entrer">localisation:</label>
                        <input type="text" class="form-control" id="localisation" name="localisation" placeholder = "localisation" value="<?php echo $localisation ?>">
                        <span class="help-inline"><?php echo $localisationError ?></span>
                    </div>
                  
                    
                    <div class="form-group">
                        <label for="id_condition">id_condition:</label>
                        <input type="text" class="form-control" id="id_condition" name="id_condition" placeholder=" id_condition " value="<?php echo $id_condition ?>">
                        <span class="help-inline"><?php echo $id_conditionError ?></span>
                    </div>
                       

                        <div class="form-group">
                            <label for="image">Sélectionner une image:</label>
                            <input type="file" id="image" name="image"> 
                            <span class="help-inline"><?php echo $imageError;?></span>
                        </div>
                    <br>
                    <div class="form-actions">
                        <button type="submit" value="ajouter" name="ajouter" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span> Ajouter</button>
                        <a class="btn btn-primary" href="index.php"><span class="glyphicon glyphicon-arrow-left"></span> Retour</a>
                    </div>
                </form>
            </div>
        </div>   
  </body>
 </html>