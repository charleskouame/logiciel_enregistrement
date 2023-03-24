<?php
    require 'database.php';
 
      if(!empty($_GET['id_proprietaire'])){
        $id_proprietaire = checkInput($_GET['id_proprietaire']);
        }

    if(!empty($_POST)) 
    {
        $id_proprietaire = $_POST['id_proprietaire'];
        $db = Database::connect();
        $statement = $db->prepare("DELETE FROM `proprietaire` WHERE id_proprietaire = ?");
        $statement->execute(array($id_proprietaire));
        Database::disconnect();
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


  <style>
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

 </style>

<!DOCTYPE html>
<html>
    <head>
        <title>Supprimer</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/styles.css">
    </head>
    
    <body>
        <h1 class="text-logo text-center"></span> GESTIONNAIRE IMMOBILIERE</h1>
         <div class="container admin">
            <div class="row">
                <h1><strong>Supprimer un Propritaire</strong></h1>
                <br>
                <form class="form" action="<?php echo 'supprimerpropriet.php?id_proprietaire='.$id_proprietaire;?>" role="form" method="post">
                    <input type="hidden" name="id_proprietaire" value="<?php echo $id_proprietaire;?>"/>
                    <p class="alert alert-warning">Etes vous sur de vouloir supprimer ?</p>
                    <div class="form-actions">
                      <button type="submit" class="btn btn-warning">Oui</button>
                      <a class="btn btn-default" href="proprietaireint.php">Non</a>
                    </div>
                </form>
            </div>
        </div>   
    </body>
</html>

