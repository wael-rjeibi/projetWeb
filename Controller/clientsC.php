<?php
include_once("C:/xampp/htdocs/wael/config.php");
include_once("C:/xampp/htdocs/wael/Model/clients.php");
class clientsC
{
    public function statistiques()
{
  
  $sql="select adresse,count(*) from clients group by adresse";
    
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}



    
    function afficherClients(){
        $sql="select * from clients";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}
function afficherClientsTrie($cin){
    $sql="select * from clients order by ".$cin;
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
}
catch(Exception $e){
    echo 'Erreur: '.$e->getMessage();
}
}

public function ajouterClients($clients){
    $sql="insert into clients(cin,nom,prenom,adresse,destination) values(:cin,:nom,:prenom,:adresse,:destination)";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([
        'cin'=>$clients->getCin(),
        'nom'=>$clients->getNom(),
        'prenom'=>$clients->getPrenom(),
        'adresse'=>$clients->getAdresse(),
        'destination'=>$clients->getDestination()
        ]);
        
    }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
}




function modifierClients($idclient,$clients) {
    $sql="UPDATE  clients set cin=:cin,nom=:nom,prenom=:prenom ,adresse=:adresse, destination=:destination where idclient=".$idclient."";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
    
        $query->execute([
        'cin'=>$clients->getCin(),
        'nom'=>$clients->getNom(),
        'prenom'=>$clients->getPrenom(),
        'adresse'=>$clients->getAdresse(),
        'destination'=>$clients->getDestination()
        ]);			
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }		
  }
public function afficherClientsDetail(int $rech1)
    {
        $sql="select * from clients where idclient=".$rech1."";
        
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
public function supprimerClients($idclient)
{
    $sql = "DELETE FROM clients WHERE idclient=".$idclient."";
    $db = config::getConnexion();
    $query =$db->prepare($sql);
    
    try {
        $query->execute();
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());

    }
}
function rechercherUsers($nom)
    {        
                 $sql="SELECT * FROM clients WHERE nom LIKE '".$nom."%'";
                 $db = config::getConnexion();

               	try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	


    }
}

?>