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
     box-sizing: border-box;
   }

   body{
     background-image: url(images/1440.jpg);
     background-size: cover;
     background-attachment: fixed;
     font-family: new time roman;
   }
      

   .get-in-touch {
  max-width: 800px;
  margin: 50px auto;
  position: relative;

}
.get-in-touch .title {
  text-align: center;
  text-transform: uppercase;
  letter-spacing: 3px;
  font-size: 3.2em;
  line-height: 48px;
  padding-bottom: 48px;
     color: #5543ca;
    background: #5543ca;
    background: -moz-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
    background: -webkit-linear-gradient(left,#f4524d  0%,#5543ca 100%) !important;
    background: linear-gradient(to right,#f4524d  0%,#5543ca  100%) !important;
    -webkit-background-clip: text !important;
    -webkit-text-fill-color: transparent !important;
}

.contact-form .form-field {
  position: relative;
  margin: 32px 0;
}
.contact-form .input-text {
  display: block;
  width: 100%;
  height: 36px;
  border-width: 0 0 2px 0;
  border-color: #5543ca;
  font-size: 18px;
  line-height: 26px;
  font-weight: 400;
}
.contact-form .input-text:focus {
  outline: none;
}
.contact-form .input-text:focus + .label,
.contact-form .input-text.not-empty + .label {
  -webkit-transform: translateY(-24px);
          transform: translateY(-24px);
}
.contact-form .label {
  position: absolute;
  left: 20px;
  bottom: 11px;
  font-size: 18px;
  line-height: 26px;
  font-weight: 400;
  color: #5543ca;
  cursor: text;
  transition: -webkit-transform .2s ease-in-out;
  transition: transform .2s ease-in-out;
  transition: transform .2s ease-in-out, 
  -webkit-transform .2s ease-in-out;
}
.contact-form .submit-btn {
  display: inline-block;
  background-color: #000;
   background-image: linear-gradient(125deg,#a72879,#064497);
  color: #fff;
  text-transform: uppercase;
  letter-spacing: 2px;
  font-size: 16px;
  padding: 8px 16px;
  border: none;
  width:200px;
  cursor: pointer;
}


      </style>
    </head>
    
    
    <body>
    <section class="get-in-touch">
   <h1 class="title">Espace Clients</h1>
   <form class="contact-form row">
      <div class="form-field col-lg-6">
         <input id="name" class="input-text js-input" type="text" required>
         <label class="label" for="nom">Nom</label>
      </div>
      <div class="form-field col-lg-6">
         <input id="name" class="input-text js-input" type="text" required>
         <label class="label" for="prenom">Prenom</label>
      </div>
      <div class="form-field col-lg-6">
         <input id="name" class="input-text js-input" name="adresse" type="varchar" required>
         <label class="label" for="name">Adresse</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="email" class="input-text js-input" name="email" type="email" required>
         <label class="label" for="email">E-mail</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="company" class="input-text js-input" name="fonction" type="varchar" required>
         <label class="label" for="fonction">Fonction</label>
      </div>
       <div class="form-field col-lg-6 ">
         <input id="phone" class="input-text js-input" name="contrat_de_bail" type="varchar" required>
         <label class="label" for="contrat_de_bail">contrat_de_bail</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="phone" class="input-text js-input" name="Contact_number" type="phone" required>
         <label class="label" for="phone">Contact_number</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="phone" class="input-text js-input" name="type_de_maison_choisi" type="text" required>
         <label class="label" for="type_de_maison_choisi">type_de_maison_choisi</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="phone" class="input-text js-input" name="prix_de_la_maison" type="text" required>
         <label class="label" for="prix_de_la_maison">prix_de_la_maison</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="phone" class="input-text js-input" name="etat_des_lieux" type="text" required>
         <label class="label" for="etat_des_lieux">etat_des_lieux</label>
      </div>

      <div class="form-field col-lg-6 ">
         <input id="phone" class="input-text js-input" name="date_entrer" type="date" required>
         <label class="label" for="date_entrer">date_entrer</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="varchar" name="date_de_relance" class="input-text js-input" type="date" required>
         <label class="label" for="date_de_relance">date_de_relance</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="varchar" class="input-text js-input" type="varchar" name="situation_geographique_de_la_maison" required>
         <label class="label" for="situation_geographique_de_la_maison">situation_geographique_de_la_maison</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="email" class="input-text js-input" type="email" required>
         <label class="label" for="phone">email</label>
      </div>
      
      <div class="form-field col-lg-12">
         <input class="submit-btn" type="submit" value="Submit">
      </div>
   </form>
</section>

    </body>

    </html>
