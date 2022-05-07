<?php
class clients{
    private ?int $idclient = null;
    private ?int $cin = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $adresse = null;
    private ?string $destination = null;
    function __construct(int $cin,string $nom,string $prenom,string $adresse,string $destination)
    {
        
        $this->cin=$cin;
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->adresse=$adresse;
        $this->destination=$destination;
    }
    function getIdclient(): int{
        return $this->idclient;
    }
    function getCin(): int{
        return $this->cin;
    }
   
    function getNom(): string{
        return $this->nom;
    }
    
    function getPrenom(): string{
        return $this->prenom;
    }
    function getAdresse(): string{
        return $this->adresse;
    }
    function getDestination(): string{
        return $this->destination;
    }
    function setCin(int $cin): void{
        $this->cin=$cin;
    }
    
    function setNom(string $nom): void{
        $this->nom=$nom;
    }
    function setPrenom(string $prenom): void{
        $this->prenom=$prenom;
    
    }
    function setAdresse(string $adresse): void{
        $this->adresse=$adresse;
    
    }
    function setDestination(string $destination): void{
        $this->destination=$destination;
    
    } 
     
   
}
?>