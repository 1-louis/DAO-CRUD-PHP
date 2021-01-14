<?php 

 namespace App\Entity;
 
class Voiture{

    private $id; 

    private $marque;

    private $modele;

    private $annee;

    private $version;

    private $nbkm;

    public function getId(){
        return $this->id;
    }

    public function getMarque(){
        return $this->marque;

    }
    public function setMarque($marque){
        $this->marque = $marque;
        return $this;
    } 

    public function getModele(){
        return $this->modele;

    }
    public function setModele($modele){
        $this->modele = $modele;
        return $this;
    } 
    public function getAnnee(){
        return $this->annee;

    }
    public function setAnnee($annee){
        $this->annee = $annee;
        return $this;
    }

    public function getVersion(){
        return $this->version;

    }
    public function setVersion($version){
        $this->version = $version;
        return $this;
    } 

    
    public function getNbkm(){
        return $this->nbkm;

    }
    public function setNbkm($nbkm){
        $this->nbkm = $nbkm;
        return $this;
    } 
    
}