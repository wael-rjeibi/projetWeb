<?php

include_once '../Model/clients.php';
include_once '../Controller/clientsC.php';
$clientsC = new clientsC();
$listeC = $clientsC->afficherClients();

$clientsC = new clientsC();
if (
    isset($_POST["cin"]) && 
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) && 
    isset($_POST["adresse"]) &&
    isset($_POST["destination"])
) {
    if (
        !empty($_POST["cin"]) && 
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) && 
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
        if(strlen($_POST['cin'])!=8){
          echo "<script>alert('cin doit etre sur 8 chiffres veuillez ressayer...')</script>";
        }
        else{
        $clientsC->ajouterClients($clients);
        
        header('Location:backClients.php');
    }}
    else
        $error = "Missing information";
}
if(isset($_POST['submit'])){
	$listeC= $clientsC->rechercherUsers($_POST['search']);
    
}
if((!isset($_POST['search'])) || $_POST['search']==""){
    $listeC = $clientsC->afficherClients();
}
if (isset($_POST["tri"])) {
  if(!empty($_POST["tri"]))
  $listeC = $clientsC->afficherClientsTrie( $_POST['tri']);
}

?>


<link rel="stylesheet" href="style.css" type="text/css" media="all" />

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>SpringTime</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />


</head>
<script src="js/saisie.js"></script>

<body>
<!--<link rel="stylesheet" href="css3/style.css" type="text/css" media="all" />-->
<!-- Header -->
<div id ="header"> 
  <div class="shell"> 
    <!-- Logo + Top Nav -->
    <div id="top">
      <h1><a href="#">waselny</a></h1>
      <div id="top-navigation"> </a> </span> <a href="logout.php">Log out</a> </div>
      <form action="" method="POST" class="search-form">
                <input type="text" name="search" id="search" placeholder="search" style="background:#1fe0ff;">
					<button type="submit" class="searchButton" name="submit">search</button>
				</form>



    </div>
    <!-- End Logo + Top Nav -->
    <!-- Main Nav -->
    <div id="navigation">
      <ul>
        <li><a href=".php" class="active"><span>Gestion admins</span></a></li>
       
        <li><a href=".php" class="active"><span>Gestion produits</span></a></li>
      
      </ul>
    </div>
    <!-- End Main Nav -->
  </div>
</div>
<!-- End Header -->
<!-- Container -->
<div id="container">
  <div class="shell">
    <!-- Small Nav -->
    <div class="small-nav"> <a href="#">Dashboard</a> <span>&gt;</span> Current Articles </div>
    <!-- End Small Nav -->
    <!-- Message OK -->
    
    <!-- End Message OK -->
    <!-- Message Error -->
    
    <!-- End Message Error -->
    <br />
    <!-- Main -->
    <div id="main">
      <div class="cl">&nbsp;</div>
      <!-- Content -->
      <div id="content">
        <!-- Box -->
       
          <!-- Box Head -->
          <div class="box-head">
            <h2 class="left">Current Accounts</h2>
            <div class="right">
            
            </div>
          </div>
          
          <!-- End Box Head -->
          <!-- Table -->
          <div class="table">
          
            <table width="100%" border="0" cellspacing="0" cellpadding="0" >
        
              <tr>
               
                <th>IdClients</th>
                <th>Cin</th>
            
                <th>Nom</th>
                <th>Prenom</th>
            
            <th>Adresse</th>
            <th>Destination</th>
              
               
              </tr>

              

              <?php
    foreach($listeC as $clients){
        ?>


              <tr>
                <td><?php echo $clients['idclient']; ?></td>
                <td><?php echo $clients['cin']; ?></td>
                 
                <td><?php echo $clients['nom']; ?></td>
                <td><?php echo $clients['prenom']; ?></td>  
                <td><form action="map.php" method="POST">
                              <input class="btn btn-danger" type="submit" name="submit1" value="<?php echo $clients['adresse']; ?>">
                              <input type="hidden" name="adresse" value="<?=$clients['adresse']?>">
                          </form>
                </td>
                <td><?php echo $clients['destination']; ?></td>
</td>
               
                <td><a href="supprimerClients.php?idclient=<?php echo $clients['idclient']; ?>" class="ico del">Delete</a> </td>
                <td> <a href="modifierClients.php?idclient=<?php echo $clients['idclient']; ?>" class="ico edit">Edit</a>
               
              
              
              
              </td>
              </tr>
              <?php } ?>
              
              
              
              
              
              
            
           
            </table>
            <!-- End Pagging -->
          </div>
          <!-- Table -->
      
        <!-- End Box -->
        <!-- Box -->
        <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Add New Event</h2>
          </div>
          <!-- End Box Head -->
          <form action="#" method="post">
            <!-- Form -->
            <div class="form">
              <p> 
                <label>Cin </label>
                <input type="number" class="field size1" name="cin" idclient="cin"/>
              </p>
              

              <p> 
                <label>Nom </label>
                <input type="texte" class="field size1" name="nom" idclient="nom" />
              </p>
              

              <p> 
                <label>Prenom </label>
                <input type="texte" class="field size1" name="prenom" idclient="prenom" />
              </p>
              <p> 
                <label>Adresse </label>
                <input type="texte" class="field size1" name="adresse" idclient="adresse" />
              </p>
              <p> 
                <label>Destination </label>
                <input type="texte" class="field size1" name="destination" idclient="destinatiton" />
              </p>
            </div>
            <!-- End Form -->
            <!-- Form Buttons -->
            <div class="buttons">
              <input type="Reset" class="button" value="Reset" />
              <input type="submit" class="button" value="submit" onclick="verif();"/>
            </div>
            <!-- End Form Buttons -->
          </form>
        </div>
        <!-- End Box -->
      </div>
      <!-- End Content -->
      <!-- Sidebar -->
      <div id="sidebar">
        <!-- Box -->
        <div class="box">
          <!-- Box Head -->
          <div class="box-head">
            <h2>Management</h2>
          </div>
          <!-- End Box Head-->
          <div class="box-content"> <a href="#" class="add-button"><span>Add new Article</span></a>
            <div class="cl">&nbsp;</div>
            <p class="select-all">
            <div class="sort">
              <form method="POST"><label></label>
              <select name="tri" class="field" >
              <option value="cin">Cin</option>
              <option value="nom">NOM</option>
              <option value="prenom">Prenom</option>
                
              </select><input type="submit"  value="trier"></form>
              
            </div>
    </p>
           
          </div>
        </div>
       
        <!-- End Box -->
      </div>
      <!-- End Sidebar -->
      <div class="cl">&nbsp;</div>
    </div>
    <div id="piechart"> </div>
    <!-- Main -->
  </div>
</div>

<?php 
include_once "../Controller/clientsC.php";
$clientsC = new clientsC();

$listeC = $clientsC->statistiques();
 ?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
    
  var data = google.visualization.arrayToDataTable([
   
  [ 'adresse', 'nom'],
  

  <?php
 
 foreach($listeC as $k){
  echo "["; echo "'";echo $k['adresse'];echo"'";echo",";echo $k['count(*)'];echo"],";}?>


 

 
]);

 // Optional; add a title and set the width and height of the chart
 var options = {'title':'ADRESSE', 'width':750, 'height':400};

 var chart = new google.visualization.PieChart(document.getElementById('piechart'));
 chart.draw(data, options);
}
</script>



<!-- End Container -->
<!-- Footer -->
<div id="footer">
  <div class="shell"> <span class="left">&copy; 2010 - CompanyName</span> <span class="right"> Design by <a href="http://chocotemplates.com">Chocotemplates.com</a> </span> </div>
</div>
<!-- End Footer -->







</body>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<div id="google_translate_element"></div>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');

    }
    </script>
</html>
