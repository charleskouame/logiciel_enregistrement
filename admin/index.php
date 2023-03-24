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
                    padding: 15px;
                   }
                   tr td{
                     padding: 6px;
                     border-radius: 2px;
                    border: 0.5px solid #000;
                   }
                   .top-bar{
                     margin-top: -60px;
                     margin-left: 450px;
                     
                   }
                   .barre{
                            display: flex;
                            flex-direction: row;
                            margin-top: 30px;
                            
                   }
                  
                   
                  
                     
              </style>
      </head>
    
    <body>
              
        <h1 class="text-logo text-center"> GESTIONNAIRE IMMOBILIERE </h1>
        
        <div class="container admin">
            <div class="row">
                 <div class="barre">
                    <h1><strong>Liste des clients </strong><a href="formclient.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Ajouter</a></h1>
                  
                    <h1 class="bn"><strong></strong><a href="../admin.php" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-plus"></span> Retour</a></h1>
                 
               </div>
                 
                 <div class="top-bar">
                      <div class="search">
                         <input type="text" name="search" placeholder="search here">
                         <label for="search"> <i class="fas fa-search"></i> </label>    
                      </div>
                      
                 </div>
                       <div class="table-results"> </div>

                            <table class="rendez-vous">
                              <thead>
                                <td>Nom</td>
                                <td>Prenom</td>
                                <td>Fonction</td>
                                <td>Mail</td>
                                <td>Contact number</td>
                                <td>Contrat de bail</td>
                                <td>Type de maison</td>
                                <td>Prix de la maison</td>
                                <td>Etat des lieux</td>
                                <td>Date d'entrer</td>
                                <td>Date de sortir</td>
                                <td>Date de relance</td>
                                <td>Localisation</td>                         
                                <td>Image</td>
                                <td>Action</td>
                              </thead>
                              <tbody>
                              <?php
                        include "database.php";
                        $db = Database::connect();
                        $statement = $db->query("SELECT `id_client`, `nom`, `prenom`, `fonction`, `email`, `Contact_number`, `contrat_de_bail`, `type_de_maison_choisi`, `prix_de_la_maison`, `etat_des_lieux`, `date_entrer`, `date_de_sortir`, `date_de_relance`, `situation_geographique_de_la_maison`, `image` FROM `locataire_client` ");
                      while($locataire_client = $statement->fetch())
                        {
                        echo '<tr>';
                        echo '<td>' . $locataire_client['nom'] . '</td>';
                        echo '<td>' . $locataire_client['prenom'] . '</td>';
                        echo '<td>' . $locataire_client['fonction'] . '</td>';
                        echo '<td>' . $locataire_client['email'] . '</td>';
                        echo '<td>' . $locataire_client['Contact_number'] . '</td>';
                        echo '<td>' . $locataire_client['contrat_de_bail'] . '</td>';
                        echo '<td>' . $locataire_client['type_de_maison_choisi'] . '</td>'; 
                        echo '<td>' . $locataire_client['prix_de_la_maison'] . '</td>';
                        echo '<td><i class=""></i>' . $locataire_client['etat_des_lieux'] . '</td>';
                        echo '<td> <i class=""></i>' . $locataire_client['date_entrer'] . '</td>';
                        echo '<td> <i class=""></i>' . $locataire_client['date_de_sortir'] . '</td>';
                        echo '<td> <i class=""></i>' . $locataire_client['date_de_relance'] . '</td>';
                        echo '<td> <i class=""></i>' . $locataire_client['situation_geographique_de_la_maison'] . '</td>';
                        echo '<td> <i class=""></i>' . $locataire_client['image'] . '</td>';
                        echo '<td> <a  href="visualisationclt.php?id_client='.$locataire_client['id_client'].'"><i class="far fa-eye"></i></td></a>';
                        echo '<td> <a  href="updateclient.php?id_client='.$locataire_client['id_client'].'"><i class="far fa-edit"></i> </td></a>';
                        echo '<td> <td> <a href="supprimerclient.php?id_client='.$locataire_client['id_client'].'"><i class="far fa-trash-alt"></i> </td></a>';
                      
                         echo '</tr>';
                        }
                        Database::disconnect();
                          ?>                     
                           </tbody>
                          </table>

            </div>
        </div>


        <script language="text/javascript">

          const searchInput = document.querySelector(".search")
          const searchResult = document.querySelector(".table-results")



          let dataArray;

          async function getUsers(){

            const res = await fetch("<?php
                        include "database.php";
                        $db = Database::connect();
                        $statement = $db->query("SELECT `id_client`, `nom`, `prenom`, `fonction`, `email`, `Contact_number`, `contrat_de_bail`, `type_de_maison_choisi`, `prix_de_la_maison`, `etat_des_lieux`, `date_entrer`, `date_de_sortir`, `date_de_relance`, `situation_geographique_de_la_maison`, `image` FROM `locataire_client` ");
                      while($locataire_client = $statement->fetch())
                        {
                        echo '<tr>';
                        echo '<td>' . $locataire_client['nom'] . '</td>';
                        echo '<td>' . $locataire_client['prenom'] . '</td>';
                        echo '<td>' . $locataire_client['fonction'] . '</td>';
                        echo '<td>' . $locataire_client['email'] . '</td>';
                        echo '<td>' . $locataire_client['Contact_number'] . '</td>';
                        echo '<td>' . $locataire_client['contrat_de_bail'] . '</td>';
                        echo '<td>' . $locataire_client['type_de_maison_choisi'] . '</td>'; 
                        echo '<td>' . $locataire_client['prix_de_la_maison'] . '</td>';
                        echo '<td><i class=""></i>' . $locataire_client['etat_des_lieux'] . '</td>';
                        echo '<td> <i class=""></i>' . $locataire_client['date_entrer'] . '</td>';
                        echo '<td> <i class=""></i>' . $locataire_client['date_de_sortir'] . '</td>';
                        echo '<td> <i class=""></i>' . $locataire_client['date_de_relance'] . '</td>';
                        echo '<td> <i class=""></i>' . $locataire_client['situation_geographique_de_la_maison'] . '</td>';
                        echo '<td> <i class=""></i>' . $locataire_client['image'] . '</td>';
                        echo '<td> <a  href="visualisationclt.php?id_client='.$locataire_client['id_client'].'"><i class="far fa-eye"></i></td></a>';
                        echo '<td> <a  href="updateclient.php?id_client='.$locataire_client['id_client'].'"><i class="far fa-edit"></i> </td></a>';
                        echo '<td> <td> <a href="supprimerclient.php?id_client='.$locataire_client['id_client'].'"><i class="far fa-trash-alt"></i> </td></a>';
                      
                         echo '</tr>';
                        }
                        Database::disconnect();
                          ?>")

                    const { results }  = await res.json()
                  
                    dataArray = orderList(results)
                    createUserList(dataArray)
                  }

           getUsers()

          function orderList(data) {

            const orderedData = data.sort((a,b) => {
              if(a.name.last.toLowerCase() < b.name.last.toLowerCase()) {
                return -1;
              }
              if(a.name.last.toLowerCase() > b.name.last.toLowerCase()) {
                return 1;
              }
              return 0;
            })
            
            return orderedData;
          }


        function createUserList(usersList) {

          usersList.forEach(user => {
             
            const listItem = document.createElement("div");
            listItem.setAttribute("class", "table-item");

            listItem.innerHTML = `
            <div class="container-img">
            <img src=${user.picture.medium}>
            <p class="name">${user.nom.last} ${user.nom.first}</p>
            </div>
            <p class="email">${user.email}</p>
            <p class="fonction">${user.fonction}</p>
            <p class="">${user.Contact_number}</p>
            <p class="">${user.contrat_de_bail}</p>
            <p class="">${user.type_de_maison_choisi}</p>
            <p class="">${user.prix_de_la_maison}</p>
            <p class="">${user.etat_des_lieux}</p>
            <p class="">${user.date_entrer}</p>
            <p class="">${user.date_de_sortir}</p>
            <p class="">${user.date_de_relance}</p>
            <p class="">${user.situation_geographique_de_la_maison}</p>
            <p class="">${user.image}</p>
            
            `
            searchResult.appendChild(listItem);
          })

        }

        searchInput.addEventListener("input", filterData)

        function filterData(e) {

          searchResult.innerHTML = ""

          const searchedString = e.target.value.toLowerCase().replace(/\s/g, "");

          const filteredArr = dataArray.filter(el => 
            el.name.first.toLowerCase().includes(searchedString) || 
            el.name.last.toLowerCase().includes(searchedString) ||
            `${el.name.last + el.name.first}`.toLowerCase().replace(/\s/g, "").includes(searchedString) ||
            `${el.name.first + el.name.last}`.toLowerCase().replace(/\s/g, "").includes(searchedString)
            )

          createUserList(filteredArr)
        }

        </script>
    </body>
</html>
