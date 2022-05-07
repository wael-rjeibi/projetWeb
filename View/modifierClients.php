<link rel="stylesheet" href="style.css" type="text/css" media="all" />
<?php
 include_once '../Controller/clientsC.php';
 
 $co = new clientsC();
 if(isset($_GET['idclient'])){
   $clientsC = new clientsC();
   $listeC = $clientsC->afficherClientsDetail($_GET['idclient']);
 
 foreach($listeC as $clients){
 ?>
 <body>
<!--<link rel="stylesheet" href="css3/style.css" type="text/css" media="all" />-->


  <div class="shell">
    <!-- Logo + Top Nav -->
    <div idclient="top">
      <h1><a href="#">Antico</a></h1>
  </div>
   <form action="#" method="post">
   <!-- Box -->
   <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Add New Event</h2>
          </div>
          <!-- End Box Head -->
            <!-- Form -->
            <div class="form">
              <p> 
                <label>Cin </label>
                <input type="number" class="field size1" name="cin" value=<?php echo $clients['cin'];?> />
              </p>
             
              <p> 
                <label>Nom </label>
                <input type="text" class="field size1" name="nom" value=<?php echo $clients['nom'];?> />
              </p>
              
              <p> 
                <label>Prenom </label>
                <input type="text" class="field size1" name="prenom" value=<?php echo $clients['prenom'];?> />
              </p>
              <p> 
                <label>Adresse </label>
                <input type="text" class="field size1" name="adresse" value=<?php echo $clients['adresse'];?> />
              </p>
              <p> 
                <label>Destination </label>
                <input type="text" class="field size1" name="destination" value=<?php echo $clients['destination'];}?> />
              </p>

             

             
            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons">
              <input type="Reset" class="button" value="Reset" />
              <input type="submit" class="button" value="submit" />
            </div>
            <!-- End Form Buttons -->
          </form>
 </div>
 </div>
 <?php
 // create event
 $clients = null;

 // create an instance of the controller

 $clientsC = new clientsC();
 if (
     isset($_POST["cin"]) && 
     isset($_POST["nom"]) &&
     isset($_POST["prenom"])&& 
     isset($_POST["adresse"]) &&
     isset($_POST["destination"])
 ) {
     if (
         !empty($_POST["cin"]) &&
         !empty($_POST["nom"]) &&
         !empty($_POST["prenom"])&&  
         !empty($_POST["adresse"]) &&
         !empty($_POST["destination"]) 
     ) {
         $clients = new clients(
             $_POST['cin'],
             $_POST['nom'],
             $_POST['prenom'],
             $_POST['adresse'],
             $_POST['destination']
         );
        $clientsC->modifierClients($_GET['idclient'],$clients);
         
         header('Location:backClients.php');
     }
     else
         $error = "Missing information";
 }

 
}

?>