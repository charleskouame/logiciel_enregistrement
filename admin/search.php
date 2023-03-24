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
   
                  
              </style>
      </head>
    
    <body>
             <div class="container ">
                  <form  method="post">
                    <input type="text" placeholder="search data" name="search">
                    <button name="submit"class="btn btn-dark btn-sm">recherche</button>
                  </form>
                  <div class="container my-5">
                    <table class="table">
                    <?php
                    session_start();
                    include "database.php";
                    
                    if(isset($_POST['submit'])){
                     $search= $_POST['search'];
                     $sql="SELECT `id_client`, `nom`, `prenom`, `fonction`, `email`, `Contact_number`, `contrat_de_bail`, `type_de_maison_choisi`, `prix_de_la_maison`, `etat_des_lieux`, `date_entrer`, `date_de_sortir`, `date_de_relance`, `situation_geographique_de_la_maison`, `image` FROM `locataire_client` where 'id_client' like '%$search' or nom like '%$search%' or prenom like '%$search%' or fonction like '$search'";  
                      
                     $result= mysqli_query($con,$sql);
                     if($result){
                      if(mysqli_num_rows($result)>0){
                       echo '<thead>
                       <tr>
                       <th> S1 noo</th>
                       <th> First Name</th>
                       <th> Last Name</th>
                       </tr>
                       </thead>';
                       while($row = mysqli_fetch_assoc($result)){ 
                       echo '<tbody>
                       <tr>
                         <td> <a href="search.php">'.$row['id_client'].'</a></td>
                         <td>'.$row['id'].'</td>
                         <td>'.$row['fname'].'</td>
                         <td>'.$row['lname'].'</td>
                       </tr>
                       </tbody>';
                      }  
                      } 
                      else{
                         echo '<h2 class="">data not found</h2>';
                         }
            
                     }
                    
                  }
                    ?>
                   
                  </table>
                  </div>
             </div>   
        
    </body>
</html>
