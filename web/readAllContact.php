<?php 
include_once '../App/Entity/voiture.php';
include_once '../App/Manager/voitureManager.php';

use App\Manager\VoitureManager;
use \App\Entity\Voiture;

$conttactManager = new VoitureManager();
$voitures = $conttactManager->readAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(empty($voitures)):?>
    <p>Il y a aucun voiture à afficher</p>
    <?php else :?>
        <?php if($voitures === false):?>
        <p>une erreur est survenu</p>
        <?php else :?>
        <table>

                <?php foreach ($voitures as $key) :?>
                
                    <tr align="center">
                        <td align="center">
                            <label for="Last"><i><?= $key->getMarque()?></i></label>       
                        </td>
                        <td align="center">
                            <label for="Last"><i><?= $key->getModele()?></i></label>
                        </td>
                        <td align="center">
                            <label for="Last"><i><?= $key->getAnnee()?></i></label>
                        </td>
                        <td align="center">
                            <label for="Last"><i><?= $key->getVersion()?></i></label>
                        </td>
                        <td align="center">
                        <b><a href="form_update_contact.php?id=<?= $key->getId()?>">Modifier </a></b>
                        </td>
                        <td align="center">
                        <b onclick="popbox()"><a href="#">Suprimer </a></b>
                        </td>
                    </tr>
                
                <?php endforeach ?>
        </table>
       <?php endif ?>
    <?php endif ?>
    <p id='sup'> <a href='./index.php' > Retour</a></p>
<?php if(isset( $msg)){echo $msg;}?>
 <!-- <script src="./script.js"></script>  -->
</body>
</html>
<script>

function supprimer() {
    let location = window.location.assign('deleteContact.php?id=<?= $key->getId()?>', "MsgWindow", "width=800,height=500");

}
function popbox() {
var txt;
if (confirm("êtes-vous sûr de vouloir vous supprimer ces valeurs !")) {
    if(supprimer()== true){
        text = window.location.assign('readAllContact.php', "MsgWindow", "width=800,height=500");;
    };
    text ="<a style='color:red;' href='deleteContact.php?id=<?= $key->getId()?>' >  Le voiture a bien été Supprimer </a> ";

} else {

    text = " <a href='./index.php' > Retour</a>";

}
    document.getElementById("sup").innerHTML = text;
}
</script>