
<?php
session_start();

include "database.php";

$nomError = $prenomError = $emailError = $motdepasseError = $imageError = $adresseError = $telephoneError = $nom = $prenom = $email = $motdepasse = $image = $adresse = $telephone = "";

if(!empty($_POST)) {
   
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $motdepasse = $_POST["motdepasse"];
    $adresse = $_POST["adresse"];
    $telephone = $_POST["telephone"];
    $image = $_FILES["image"]["name"];
    $imagePath = 'images/'. basename($image);
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

     if($imageExtension != "jpg" && $imageExtension != "png" && $imageExtension != "jpeg" && $imageExtension != "gif" ) {
      $imageError = "Les fichiers autorises sont: .jpg, .jpeg, .png, .gif";
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

     if($succes) {
        $db = Database::connect();
        $statement = $db->prepare("INSERT INTO `administrateur`(`nom`, `prenom`, `email`, `motdepasse`, `adresse`, `telephone`, `image`) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $statement->execute(array($nom, $prenom, $email, $motdepasse, $adresse, $telephone, $image));
        Database::disconnect();
        $_SESSION['inscriptionOK'] = "Felicitations, inscription effectuée avec succes veuillez vous connectez.";
        header("Location: connexion.php");
        
        


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
   }
      
   body{
     background-image: url(images/gettyim.jpg);
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
      width: 150px;
      border-radius: 10px;
      font-size: 19px;
      margin-left:20px;
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
      box-shadow: -1px 1px 50px 10px black inset;
      margin-top: 60px;
      border-radius: 20px 0px 50px 0px;
      background: rgba(0,0,0,0.5);

   }
   .get-in-touch {
      display: flex;
      justify-content: flex-end;
  max-width: 800px;
  margin: 110px auto;
  position: relative;
   }

   

     </style>
    </head>
    
    
    <body>
    <section class="get-in-touch">
          <form action="connexion.php" class="contact-form row" method="POST" enctype="multipart/form-data">
          
                 <div class="col-md-6">
                 <h4 class="text-center ">ADMINISTRATEUR</h4>
                 <span class="glyphicon"><img  class="img-responsive center-block" src="images/unnamed(5).jpg" alt=""></span>
                        
                      <input type="text" class="form-control" name="nom" placeholder="nom">
                      <p style="color:red;"><?php echo $nomError; ?></p> 

                      <input type="text" class="form-control" name="prenom" placeholder="prenom">
                      <p style="color:red;"><?php echo $prenomError; ?></p> 

                      <input type="email" class="form-control" name="email" placeholder="email">
                      <p style="color:red;"><?php  echo $emailError ?></p>

                      <input type="password" class="form-control" name="motdepasse" placeholder="motdepasse">
                      <p style="color:red;"><?php  echo $motdepasseError ?></p>

                      <input type="text" class="form-control" name="adresse" placeholder="adresse">
                      <p style="color:red;"><?php echo $adresseError; ?></p>

                      <input type="telephone" class="form-control" name="telephone" placeholder="telephone">
                      <p style="color:red;"><?php  echo $telephoneError ?></p>

                     <input type="file" class="form-control" id_admin="image" name="image" placeholder="Uploader une image">
                     <p style="color:red;"><?php echo $imageError; ?></p>
              
                     <input type = "text" name = "search" value ="search" placeholder ="mot cles">
                      <a href="#" class="x"><button type="submit" class="btn btn-primary btn btn-info">Identifiez vous</button></a>
                      
              </div>
       
          </form>
          </section>
    </body>
    </html>

    <?php
$con = new PDO('mysql:host=localhost;dbname=bdr','root','');

if(isset($_POST["submit"])){
    $str = htmlspecialchars($_POST["search"]);
    $sth = $con->prepare("SELECT * FROM 'search' WHERE  Name = '$str'");
    $sth->setFetchMode(PDO:: FETCH_OBJ);
    $sth -> execute();
    
    if($row = $sth->fetch()){
        ?>
     <br><br><br>
     <table>
     <tr>
        <th>titre</th>
        <th>contenu</th>

     </tr>
     <tr>
        <td><?php echo  $row->tire; ?></td>
        <td><?php echo  $row->contenu; ?></td>
        <td></td>
     </tr>
     </table>

     <?php
    }
     
    else{
        echo "name Does note exist";
    }
   

}
  ?>
