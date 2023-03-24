   <?php

        require_once "database.php";
        
        if(!empty($_GET["id_client"])) {
            $id_client = checkInput($_GET['id_client']);
        } 
        
        $db = Database::connect();
        $statement = $db->prepare("SELECT `id_client`, `nom`, `prenom`, `fonction`, `email`, `Contact_number`, `contrat_de_bail`, `type_de_maison_choisi`, `prix_de_la_maison`, `etat_des_lieux`, `date_entrer`, `date_de_relance`, `situation_geographique_de_la_maison`, `image` FROM `locataire_client` WHERE `id_client` = ?");
        $statement->execute(array($id_client));
        $locataire_client = $statement->fetch();
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
            background-color: green;
        }

        .container{
            display: flex;  
            justify-content :center;
            
        }
        
        .card{
            display: flex;  
            justify-content : flex-end;
            padding: 40px;
            margin-bottom: 20px;
           margin-right: 50px;
            background-color: #fff;
            border-radius: 4px;  
        }

        img{
            width: -100px;
           height: 250px;
            display: flex;
            margin-right: auto;
            margin-left: auto;
            margin-top: -38px;
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
        figcaption{
            position: relative;
            right: 50px;
        }
    </style>
    
    <body>
        <h1 class="text-logo text-center"> LOGICIEL IMMOBILIER</h1>
         <div class="container admin">
            
            <div class="row">
               <div class="col-sm-6">
                    <h1><strong><font color="#0033FF">FICHE  CLIENT</font></strong></h1>
                    <br>
                   
                  
                    <form method ="post">
                         
                        <div class="form-field col-lg-6 form-group">                           
                            <label class="" for="nom"> NOM  : </label><font color="#BA4A00"><?php echo '  '. $locataire_client['nom'];?></font>  
                        </div>

                        <div class="form-field col-lg-6 form-group">
                            <label class="" for="prenom"> PRENOM  : </label><font color="#BA4A00 "><?php echo '  '. $locataire_client['prenom'];?></font>                            
                        </div>

                        <div class="form-field col-lg-6 form-group">
                            <label class="" for="fonction">FONCTION  :</label><font color="#BA4A00 "><?php echo '  '. $locataire_client['fonction'];?>  </font>                         
                        </div>

                        <div class="form-field col-lg-6 form-group">
                            <label class="" for="email">E-MAIL :</label><font color="#BA4A00 "><?php echo '  '. $locataire_client['email'];?></font>                       
                        </div>
                       
                          <div class="form-field col-lg-6 form-group">
                            <label class="" for="contrat_de_bail">CONTRAT DE BAIL  :</label> <font color="#BA4A00 "><?php echo '  '. $locataire_client['contrat_de_bail'];?> </font>                        
                        </div>

                        <div class="form-field col-lg-6 form-group">
                            <label class="" for="Contact_number">CONTACT NUMBER  :</label> <font color="#BA4A00 "><?php echo '  '. $locataire_client['Contact_number'];?> </font>                            
                        </div>

                        <div class="form-field col-lg-6 form-group">
                            <label class="" for="type_de_maison_choisi">TYPE DE MAISON CHOISI  :</label><font color="#BA4A00 "> <?php echo '  '. $locataire_client['type_de_maison_choisi'];?> </font>                            
                        </div>

                        <div class="form-field col-lg-6 form-group">
                            <label class="" for="prix_de_la_maison">PRIX DE LA MAISON  :</label><font color="#BA4A00 "><?php echo '  '. $locataire_client['prix_de_la_maison'];?></font>  
                        </div>

                        <div class="form-field col-lg-6 form-group"> 
                            <label class="" for="etat_des_lieux">ETAIT DES LIEUX  :</label><font color="#BA4A00 "> <?php echo '  '. $locataire_client['etat_des_lieux'];?> </font>                         
                        </div>

                        <div class="form-field col-lg-6 form-group">                           
                            <label class="" for="date_entrer">DATE ENTRER  :</label><font color="#BA4A00 "> <?php echo '  '. $locataire_client['date_entrer'];?> </font>                         
                        </div>

                        <div class="form-field col-lg-6 form-group">                          
                            <label class="" for="date_de_relance">DATE DE RELANCE  :</label><font color="#BA4A00 "> <?php echo '  '. $locataire_client['date_de_relance'];?></font>                            
                        </div>

                      <div class="form-field col-lg-6 form-group">                
                        <label class="" for="situation_geographique_de_la_maison">SITUATION GEOGRAPHIE  :</label><font color="#BA4A00 "><?php echo '  '. $locataire_client['situation_geographique_de_la_maison'];?></font>                  
                      </div>
                    </div> 
                        <div class="thumbnail">                         
                        </div>
                        <figure>
                        <div class="card">
                        <figcaption><h2>Informations Confidentielles </h2></figcaption>                                               
                        <div class="container">   
                          <embed type ="" src="images/<?php echo $locataire_client['image'];?>" width = "400" height = "400">
                        </div> 
                        </div>
                        </figure>
                                 
                </form>

                <h1><strong></strong><a href="../admin/index.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Retour</a></h1>
            </div>

        


        </div> 
        
    </body>
</html>

