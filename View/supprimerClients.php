<?php
 include_once '../Controller/clientsC.php';
 $co = new clientsC();
 if(isset($_GET['idclient'])){
     $co->supprimerClients($_GET['idclient']);
 
    header('Location:backClients.php');
    }

 ?>