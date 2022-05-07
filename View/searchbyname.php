<?php
require_once "../Controller/clientsC.php";

$listeC = new clientsC();

if(isset($_POST['searchButton']) && isset($_POST['search'])){
	$listeC= $clientsC->rechercherUsers($_POST['search']);
	unset($_POST['search']);
	var_dump($listeC);
}
?>