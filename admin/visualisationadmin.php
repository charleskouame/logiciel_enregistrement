<?php
      
      session_start();

      require_once "database.php";

      if(!empty($_GET["id_admin"])) {
          $id_admin = checkInput($_GET['id_admin']);
      } 
      
      $db = Database::connect();
      $statement = $db->prepare("SELECT `id_admin`, `nom`, `prenom`, `email`, `motdepasse`, `adresse`, `telephone`, `image` FROM `administrateur` WHERE  `id_admin` = ? ");
      $statement->execute(array($id_admin));
      $administrateur = $statement->fetch();
      Database::disconnect();

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
      <title>logiciel Immobilier</title>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="../css/styles.css">
  </head>

  <style>
     body{
          background-image: url(images/1440.jpg);
          background-size: cover;
          background-attachment: fixed;
          font-family: new time roman;
        }
        .card-img{
          margin-left: 20px;
        }


      img{
         width:280px;
         height:280px; 
         align-items: flex-end;
         display: flex;  
      }

      .thumbnail{   
        position: relative;       
          background-color: green;
          top: -20px;
          width: 1400px;
      }

      .container{
          display: flex;  
          justify-content :center;    
      }
      
      .card{
          display: flex;  
          justify-content :flex-end;
          padding: 40px;
          margin-bottom: 20px;
         margin-right: 50px;
          background-color: #fff;
          
          border-radius: 4px;
          
      }
      figure{
        display: flex;
        position: relative;
      }

      img{
          width: -100px;
         height: 250px;
          display: flex;
          
          margin-top: -65px;
          padding: 10px;
          background-color: #fff;
          border: 1px solid ;
          border-radius: 4px    
      }
      .container img{
          margin-left: 20px;
      }

      h2{
          text-transform: uppercase;
          color: blue;
      }
      .elements{
         
         position: relative;
         right: 10px;
         top: 20px;
        
      }
      figcaption{
        position: relative;
        right: 100px;
        bottom: 40px;
      }
        
  </style>
  
  <body>
      <h1 class="text-logo text-center"> Logiciel Immobilier</h1>
       <div class="container admin">
          <div class="row">
             <div class="col-sm-6">
                  <h1><strong> FICHE ADMINISTRATEUR</strong></h1>
                  <br>
                 
                
                  <form method ="">
                  <div class="thumbnail">                         
                      </div>
                     <div class="elements">
                      <div class="form-field col-lg-6 form-group">                           
                          <label class="" for="nom"> NOM  : </label><font color="#BA4A00 "><?php echo '  '. $administrateur['nom'];?></font>
                      </div>

                      <div class="form-field col-lg-6 form-group">
                          <label class="" for="prenom"> PRENOM  : </label><font color="#BA4A00 "><?php echo '  '. $administrateur['prenom'];?> </font>                         
                      </div>

                      <div class="form-field col-lg-6 form-group">
                          <label class="" for="email">E-MAIL  :</label><font color="#BA4A00 "><?php echo '  '. $administrateur['email'];?> </font>                       
                      </div>
    
                      <div class="form-field col-lg-6 form-group">
                          <label class="" for="motdepasse"> MOT DE PASSE :</label><font color="#BA4A00 "> <?php echo '  '. $administrateur['motdepasse'];?> </font>                          
                      </div>

                      <div class="form-field col-lg-6 form-group">
                          <label class="" for="adresse"> ADRESSE :</label><font color="#BA4A00 "> <?php echo '  '. $administrateur['adresse'];?></font>                           
                      </div>

                      <div class="form-field col-lg-6 form-group">
                          <label class="" for="telephone">CONTACT NUMBER  :</label><font color="#BA4A00 "> <?php echo '  '. $administrateur['telephone'];?></font>                           
                      </div>

                      </div>
                      <figure>
                      <div class="card">
                      <figcaption><h2>Informations Confidentielles</h2></figcaption>                                               
                      <div class="container">   
                        <img src="../images/<?php echo $administrateur['image']; ?>"/> 
                      </div> 
                      </div>
                      </figure>
                               
               </form>
          </div>
          </strong><a href="admin2.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Retour</a></h1>
      </div>   
  </body>
</html>

