<?php 
include_once '../App/Entity/voiture.php';
include_once '../App/Manager/voitureManager.php';

use \App\Manager\VoitureManager;
//use \App\Entity\Voiture;

$voitureManager = new VoitureManager();
//$voitureManager->read($_GET['id']);
//var_dump($_GET['id']);
   $voitureM =  $voitureManager->read($_GET['id']);
  // var_dump($voitureM);

?>




    <form method="POST" action="updateContact.php">
            <table>
               <tr>
                  <td align="right">
                     <label for="First"> Marque :</label>
                     <input type="hidden" name='id' value="<?= $voitureM->getId()?>">

                  </td>
                  <td>
                     <input type="text" placeholder="Votre First marque" id="First" name="marque" value="<?= $voitureM->getMarque()?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="Last">Modele :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre Last Name" id="Last" name="modele" value="<?=  $voitureM->getModele() ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="annee">annee :</label>
                  </td>
                  <td>
                     <input type="number" placeholder="Votre annee" id="annee" name="annee" value="<?= $voitureM->getAnnee() ?>" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="version">Version :</label>
                  </td>
                  <td>
                     <input type="version" placeholder="Votre version" id="version" name="version" value="<?= $voitureM->getVersion()?>" />
                  </td>
               </tr>
      
               <tr>
                  <td align="right">
                     <label for="nbkm"> Nbkm :</label>
                  </td>
                  <td>
                     <input type="nbkm" placeholder="Confirmez votre nbkm" id="nbkm" name="nbkm" value="<?= $voitureM->getNbkm() ?>" />
                  </td>
               </tr>
               <tr>
                    <td align="right">
                     <button href="updateContact.php?id=<?= $voitureM->getId()?>" type="submit">Modif</button> 
                     <button  type="submit"><a href="./readAllContact.php">Retour </a></button>
                    </td>
               </tr> 
            </table>
            <p><?php if (isset($msg)){echo $msg;}?></p>

         </form>

