<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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

     if($succes){
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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
         
        <link rel="stylesheet" href="css/styles.css">
       
       
      <style type="text/css">
   *{
     margin: 0px;
     padding: 0px;
   }
      
   body{
        overflow: hidden;
        min-height: 100vh;
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
      display: flex;
    position: relative;
    align-items: center;
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

   .btn-info {
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


   .container {
  margin: 0 auto;
  height: 500px;
  width: 940px;
  position: relative;
}

:root {
  --size: 200px;
  --main: rgb(253, 45, 45);
}

.container {
  margin: 0 auto;
  height: 500px;
  width: 940px;
  position: relative;
}
.container i {
  position: absolute;
  font-size: 3rem;
  top: 50%;
  transform: translateY(-50%);
  animation: scale 2s linear infinite;
  cursor: pointer;
}
@keyframes scale {
  0% {
    transform: scale(1);
  }
  50% {
    transform: scale(1.1) translateX(2px);
  }
  100% {
    transform: scale(1);
  }
}
.fa-chevron-right {
  right: 1px;
}

.cube-container {
  background: url(./media/basic-pics/CAEN-Musee-des-Beaux-Arts.jpg) no-repeat center/cover;
  width: 800px;
  height: 400px;
  box-shadow: 0 0 5px white;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  cursor: move;
}
/* SHADOW UNDER CUBE */
.cube-container::after {
  content: '';
  display: block;
  position: absolute;
  left: 50%;
  bottom: -10px;
  transform: translateX(-50%);
  height: 10%;
  width: 290px;
  background: rgb(39, 39, 39);
  filter: blur(20px);
  z-index: 100;
}

/* 3D CUBE PARAMETERS */
.cube {
  margin: 5rem auto 0;
  width:var(--size);
  height:var(--size);
  transform-style: preserve-3d;  
  position: relative;
  animation: spin 1500s infinite linear;
}
.front {
  transform: rotateY(-5deg) rotateZ(3deg) rotateX(10deg) !important;
}
.left {
  transform: rotateY(95deg) rotateZ(2deg) rotateX(-6deg) !important;
}
.right {
  transform: rotateY(-85deg) rotateZ(-2deg) rotateX(-10deg) !important;
}
.top {
  transform: rotateY(-5deg) rotateZ(6deg) rotateX(-90deg) !important;
}
.bottom {
  transform: rotateY(-5deg) rotateZ(-12deg) rotateX(95deg) !important;
}
.back {
  transform: rotateY(175deg) rotateZ(2deg) rotateX(9deg) !important;
}
.side {
  position:absolute;
  opacity: 0.95;
  width:var(--size);
  height:var(--size);
  font-size: 4rem;
  font-weight: bold;
}
#front {
  background: url(./media/basic-pics/juan33.jpg) no-repeat center/cover;
  transform: translateZ(calc(var(--size) / 2)); 
}
#top {
  background: url(./media/basic-pics/juan333.jpg) no-repeat center/cover;
  transform: rotateX(-270deg) translateY(calc(-1 * ( var(--size) / 2 ) ) );
  transform-origin: top center;
}
#bottom {
  background: url(./media/basic-pics/juan11.jpg) no-repeat center/cover;  
  transform: rotateX(270deg) translateY(calc( var(--size) / 2) );
  transform-origin: bottom center; 
}
#right {
  background: url(./media/basic-pics/juan44.jpg) no-repeat center/cover;
  transform: rotateY(-270deg) translateX(calc( var(--size) / 2) );
  transform-origin: top right;
}
#left {
  background: url(./media/basic-pics/juan555.jpg) no-repeat center/cover;
  transform: rotateY(270deg) translateX(calc(-1 * ( var(--size) / 2 ) ));
  transform-origin: center left;
}
#back {
  background: url(./media/basic-pics/juan111.jpg) no-repeat center/cover;
  transform: rotateY(-180deg) translateZ(calc(( var(--size) / 2 ) ));
}
@keyframes spin {
	0% {
    transform: rotateY(30deg) rotateZ(25deg) rotateX(8deg);  
  }
	90% {
    transform: rotateY(3600deg) rotateZ(3600deg) rotateX(3600deg);
  }
}



     </style>
    </head>
    
    
    <body>

    


    
 
    
    
    <section class="get-in-touch">
          <form action="index.php" class="contact-form row" method="POST" enctype="multipart/form-data">
          
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
              
                 
                      <a href="#" class="x"><button type="submit" class="btn btn-primary btn btn-info">Identifiez vous</button></a>
                      <a href="admin/admin2.php" class="btn btn-primary btn btn-info">retour</a>   
              </div> 
          </form>

             
        
          
            
            
               <div class="container">
               <i class="fas fa-chevron-left arrow" id="leftArrow"></i>
               <div class="">
                  <div class="cube">
                  <div class="side" id="front"></div>
                  <div class="side" id="bottom"></div>
                  <div class="side" id="top"></div>
                  <div class="side" id="left"></div>
                  <div class="side" id="right"></div>
                  <div class="side" id="back"></div>
                  </div>
               </div>
               <i class="fas fa-chevron-right arrow" id="rightArrow"></i>
            </div>
         
          </section>

        

   <script type="text/javascript">
      const cube = document.querySelector('.cube');
      const container = document.querySelector('.cube-container');

      // TURN CUBE ON MOUSEMOVE INSIDE CONTAINER
      container.addEventListener('mousemove', (e) => {

      rotY = e.clientX / 1.8;
      rotZ = e.clientY / 1.8;

      cube.style.animation = 'none';
      cube.style.transform = 'rotateY(' + rotY + 'deg) rotateZ(' + rotZ + 'deg)';
      cube.style.transition = '500ms ease-out';

      container.addEventListener('mouseleave', () => {
         cube.style.animation = 'spin 1500s infinite linear';
      });
      });

      // TURN CUBE USING ARROW
      document.body.addEventListener('click', function(e) {

      cube.style.animation = 'none';
      cube.style.transition = '1.2s ease';

      // PICK A RANDOM FACE OF THE CUBE
      const classes = ['front','back','top','bottom','right','left'];
      classToUse = classes[Math.floor(Math.random() * classes.length)];

      // INSURE TO PICK A NEW CLASS EVERYTIME
      if (cube.classList.contains(classToUse)) {
         classToUse = classes[Math.floor(Math.random() * classes.length)];
      }; 
      
      // ADD CLASS TO SHOW A RANDOM FACE
      if (e.target.classList.contains('arrow')) {
         cube.classList.remove('front','back','top','bottom','right','left');
         cube.classList.add(classToUse);
         };
      });

      // RESTART ANIMATION WHEN LEAVING ARROW
      document.querySelectorAll('.arrow').forEach(item => {
      item.addEventListener('mouseleave', () => {
         cube.style.animation = 'spin 1500s infinite linear';
         cube.classList.remove('front','back','top','bottom','right','left');
      });
      });
      
   </script>
          
          <script src="" type="text/javascript" ></script>
      </body>
    </html>
