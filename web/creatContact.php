<?php
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
include_once '../App/Entity/voiture.php';
include_once '../App/Manager/voitureManager.php';

use \App\Manager\voitureManager;
use \App\Entity\voiture;

$voitureManager = new voitureManager();
$voiture = new voiture();

$voiture=$voitureManager->read($_POST['id']);
var_dump($voiture->fetchObject($_GET['marque']));

$voiture->setMarque($_POST['marque'])
        ->setModele($_POST['modele'])
        ->setAnnee($_POST['annee']);
       




    $sevaIsOk = $voitureManager->save($voiture);
    var_dump($sevaIsOk);
     die($sevaIsOk);
     exit();

    if($sevaIsOk){
        $message = 'Le voiture a  été ajoutée';
        header ('Location: form_update_voiture.php');
    }else{
        $message = 'Le voiture n\'a pas été ajoutée';

    }

    echo "$message";