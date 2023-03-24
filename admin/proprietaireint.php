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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/styles.css">
              <style>
                body{
            background-image: url(images/1440.jpg);
            background-size: cover;
            background-attachment: fixed;
            font-family: new time roman;
                  }

                  .table{
                     width: 100%;
                     height: 100%;
                     padding: 20px;
                   }
                   
                   .table table{
                     width: 90%;
                     height: 100%;
                     padding: 15px;
                     margin: 0 auto;

                   }
                   tbody{
                    text-align: left;
                    color: #235a81;
                     border-radius: 2px;
                    border: 0.5px solid #000;
                   } 
                   tr{
                    background: #ccc;

                   } 
                   tr:nth-child(odd){
                    background: #fff;
                   }
                   tr:hover{
                    background: #444;
                    color: #fff;
                   }
                   thead td{
                    background: #6699FF;
                    font-size: 12.5px;
                    color:#fff;
                    border-radius: 2px;
                    border: 0.5px solid #000;
                    padding 15px;
                   }
                   tr td{
                     padding: 6px;
                     border-radius: 2px;
                    border: 0.5px solid #000;
                   }

              </style>
      </head>
    
    <body>
        <h1 class="text-logo text-center"> GESTIONNAIRE IMMOBILIERE </h1>
        <div class="container admin">
            <div class="row">
                <h1><strong>Liste des Propriretaire </strong><a href="proprietaire.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h1>
                <h1><strong></strong><a href="../admin.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Retour</a></h1>
                            <table class="rendez-vous">
                              <thead>
                                <td>Nom</td>
                                <td>Prenom</td>
                                <td>Email</td>
                                <td>Telephone</td>
                                <td>mandat de gestion</td>
                                <td>titre de propriete</td>
                                <td>date d'echeance</td>
                                <td>attestation</td>
                                <td>ACD</td>
                                <td>CPF</td>
                                <td>Prix</td>
                                <td>Message</td>
                                <td>Image</td>           
                                <td>Action</td>
                              </thead>
                              <tbody>
                              <?php
                        include "database.php";
                        $db = Database::connect();
                        $statement = $db->query("SELECT `id_proprietaire`, `nom`, `penom`, `email`, `telephone`, `mandat_de_gestion`, `titre_de_propriete`, `date_echeance`, `attestation`, `ACD`, `CPF`, `prix`, `message`, `image` FROM `proprietaire` ");
                      while($proprietaire = $statement->fetch())
                        {
                        echo '<tr>';
                        echo '<td>' . $proprietaire['nom'] . '</td>';
                        echo '<td>' . $proprietaire['penom'] . '</td>';
                        echo '<td>' . $proprietaire['email'] . '</td>';
                        echo '<td>' . $proprietaire['telephone'] . '</td>';
                        echo '<td>' . $proprietaire['mandat_de_gestion'] . '</td>';
                        echo '<td>' . $proprietaire['titre_de_propriete'] . '</td>'; 
                        echo '<td>' . $proprietaire['date_echeance'] . '</td>';
                        echo '<td>' . $proprietaire['attestation'] . '</td>';
                        echo '<td><i class=""></i>' . $proprietaire['ACD'] . '</td>';
                        echo '<td> <i class=""></i>' . $proprietaire['CPF'] . '</td>';
                        echo '<td> <i class=""></i>' . $proprietaire['prix'] . '</td>';
                        echo '<td> <i class=""></i>' . $proprietaire['message'] . '</td>';
                        echo '<td> <i class=""></i>' . $proprietaire['image'] . '</td>';
                        
                        echo '<td> <a  href="visualisationpropriet.php?id_proprietaire='.$proprietaire['id_proprietaire'].'"><i class="far fa-eye"></i></td></a>';
                        echo '<td> <a  href="updatepropriet.php?id_proprietaire='.$proprietaire['id_proprietaire'].'"><i class="far fa-edit"></i></td></a>';
                        echo '<td> <td> <a href="supprimerpropriet.php?id_proprietaire='.$proprietaire['id_proprietaire'].'"><i class="far fa-trash-alt"></i> </td></a>';
                       
                         echo '</tr>';
                        }
                        Database::disconnect();
                          ?>                     
                           </tbody>
                          </table>

            </div>
        </div>
    </body>
</html>
