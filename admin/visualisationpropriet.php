<?php
      
      session_start();

      require_once "database.php";

      if(!empty($_GET["id_proprietaire"])) {
          $id_proprietaire = checkInput($_GET['id_proprietaire']);
      }
       
      
      $db = Database::connect();
      $statement = $db->prepare("SELECT `id_proprietaire`, `nom`, `penom`, `email`, `telephone`, `mandat_de_gestion`, `titre_de_propriete`, `date_echeance`, `attestation`, `ACD`, `CPF`, `prix`, `message`, `image` FROM `proprietaire` WHERE  `id_proprietaire` = ? ");
      $statement->execute(array($id_proprietaire));
      $proprietaire = $statement->fetch();
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
      <script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>
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
            position: relative;
          left: 0px;
        }


      img{
         width:280px;
         height:280px; 
         align-items: flex-end;
         justify-content: flex-end;    
      }

      .imge{
         position: relative;
         margin-left: 1000px;
        }

       form div{
        display: inline;
         position: relative;
         flex-wrap: wrap;
         }

          div form{
          display: file;
          position: relative;
         }

         .ctrer2{
            position: relative;
            color: blue;
            top: -20px;
            left: 300px;
         }
          .card{
            margin-block-end: -300px;
            padding-bottom: 0;
         }
         .format{
            margin: -300px;
          
         }

     
      
  </style>
  

  <script>


  </script>
  <body> 
      <h1 class="text-logo text-center"> FICHE PROPRIETAIRE</h1>
       <div class="container admin">
          <div class="row">
             <div class="col-sm-6"><br>
                  <form method ="" class="ctrer">
                      
                    <div class="">
                      <figure class="card">
                       <figcaption class="ctrer2"><h2>INFORMATIONS CONFIDENTIELLES</h2></figcaption>                                                
                       <div class="imge">   
                        <embed type="" src="../admin/images/<?php echo $proprietaire['image'];?>" width="500" height="300">
                       </div> 
                      </figure>*


                      
                    <div class="format"> 
                      <div class="form-field col-lg-6 form-group">                           
                          <label class="" for="nom"> NOM : </label><font color="#BA4A00"><?php echo '  '. $proprietaire['nom'];?></font>
                      </div>

                      <div class="form-field col-lg-6 form-group">
                          <label class="" for="penom"> PRENOM : </label><font color="#A4A00 "><?php echo '  '. $proprietaire['penom'];?></font>                          
                      </div>B

                      <div class="form-field col-lg-6 form-group">
                          <label class="" for="email">E-MAIL :</label><font color="#BA4A00 "><?php echo '  '. $proprietaire['email'];?></font>                        
                      </div>
    
                      <div class="form-field col-lg-6 form-group">
                          <label class="" for="phone"> TELEPHONE :</label><font color="#BA4A00"> <?php echo '  '. $proprietaire['telephone'];?></font>                           
                      </div>

                      <div class="form-field col-lg-6 form-group">
                          <label class="" for="mandat_de_gestion"> MANDAT DE GESTION:</label> <font color="#BA4A00 "><?php echo '  '. $proprietaire['mandat_de_gestion'];?></font>                           
                      </div>

                      <div class="form-field col-lg-6 form-group">
                          <label class="" for="titre_de_propriete">TITRE DE PROPRIETE :</label> <?php echo '  '. $proprietaire['titre_de_propriete'];?> </font>                          
                      </div>
                        
                      <div class="form-field col-lg-6 form-group">
                          <label class="" for="date">DATE ECHEANCE :</label> <font color="#BA4A00 "><?php echo '  '. $proprietaire['date_echeance'];?></font>                           
                      </div>

                      <div class="form-field col-lg-6 form-group">
                          <label class="" for="attestation">ATTESTATION :</label> <?php echo '  '. $proprietaire['attestation'];?>  </font>                         
                      </div>
                      <div class="form-field col-lg-6 form-group">
                          <label class="" for="ACD">ACD :</label><font color="#BA4A00 "> <?php echo '  '. $proprietaire['ACD'];?> </font>                          
                      </div>
                      <div class="form-field col-lg-6 form-group">
                          <label class="" for="CPF">CPF :</label> <font color="#BA4A00 "><?php echo '  '. $proprietaire['CPF'];?></font>                           
                      </div>
                      <div class="form-field col-lg-6 form-group">
                          <label class="" for="prix">PRIX :</label><font color="#BA4A00 "> <?php echo '  '. $proprietaire['prix'];?></font>                          
                      </div>
                      <div class="form-field col-lg-6 form-group">
                          <label class="" for="message">COMMENTAIRE:</label><font color="#BA4A00 "> <?php echo '  '. $proprietaire['message'];?></font>                           
                      </div>
                      </div>
                    </div>         
              </form>
             
            </div>
              
          </div>
          <a href="proprietaireint.php" class="x"><button type="submit" class="btn btn-primary btn btn-info">Retour</button></a>
</div>
       <div class="lien"></div>

       const vars  = document.queryselector(".lien");
       vars.addEventListner('clist', => )
  </body>
</html>

