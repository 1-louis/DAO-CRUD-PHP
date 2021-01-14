<?php 
include_once '../App/Entity/voiture.php';
include_once '../App/Manager/voitureManager.php';

use \App\Manager\VoitureManager;
use \App\Entity\Voiture;

$voitureManager = new VoitureManager();

$voiture = $voitureManager->read($_POST['id']);

    $voiture->setMarque($_POST['marque']);
    $voiture->setModele($_POST['modele']);
    $voiture->setAnnee($_POST['annee']);
    $voiture->setVersion($_POST['version']);
    $voiture->setNbkm($_POST['nbkm']);

        $sevaIsOk = $voitureManager->save($voiture);
       // var_dump($Manager);
        //exit();
if($sevaIsOk){
    $msg = "La voiture a bien été modiffier";
  //  header ('Location: readAllContact.php');

}else{
    $msg = 'la voiture n a pas peu etre modiffier';
} 

echo "$msg";
?>

<button  type="submit"><a href="./readAllContact.php">Retour </a></button>