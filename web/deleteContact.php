<?php 
include_once '../App/Entity/voiture.php';
include_once '../App/Manager/voitureManager.php';

//use App\Entity\voiture;
use \App\Manager\VoitureManager;
use \App\Entity\Voiture;
$voitureManager = new VoitureManager();

 //$voitureManager->readAll($_GET['id']);
$voiture= $voitureManager->read($_GET['id']);

$deleteOk = $voitureManager->delete($voiture);

if($deleteOk){

    $msg = "Le voiture a bien été Supprimer";
    //header ('Location: readAllContact.php');

}else{
    $msg = 'le voiture n a pas peu etre Supprimer';
}

echo "$msg";
?>
<button  type="submit"><a href="./readAllContact.php">Retour </a></button>