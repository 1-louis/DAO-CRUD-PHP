<?php 
include_once '../App/Entity/voiture.php';
include_once '../App/Manager/voitureManager.php';

use \App\Manager\VoitureManager;
use \App\Entity\Voiture;


$voiture = new Voiture();

    $voiture->setMarque($_POST['marque'])
    ->setModele($_POST['modele'])
    ->setAnnee($_POST['annee'])
    ->setVersion($_POST['version'])
    ->setNbkm($_POST['nbkm']);
    //var_dump($voiture);




    $voitureManager = new VoitureManager();
if(empty($_POST['modele'] || $_POST['marque'] || $_POST['version'] )){
    $msg = 'les champs ne doivent pas rester vide';
}else{ 

    $sevaIsOk = $voitureManager->save($voiture);
  //  var_dump($sevaIsOk);

 
    //die($sevaIsOk);
    //exit();

    if($sevaIsOk){
        $msg = 'une voiture a  été ajoutée';
        header ('Location: readAllContact.php');

    }else{
        $msg = 'aucune voiture n\'a pas été ajoutée';

    }

}
    echo "$msg";