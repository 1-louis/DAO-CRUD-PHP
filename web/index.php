

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud-php</title>
</head>
<body>
<form method="POST" action="insertion.php">
            <table>
               <tr>
                  <td align="right">
                     <label for="First">Marque :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre  marque" id="First" name="marque" value="" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="Last">Modele :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre  modele" id="Last" name="modele" value="" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="annee">Annee :</label>
                  </td>
                  <td>
                     <input type="number" placeholder="Votre Annee" id="annee" name="annee" value="" />
                  </td>
               </tr>
               <tr>
                  <td align="right">
                     <label for="version">Version :</label>
                  </td>
                  <td>
                     <input type="text" placeholder="Votre version" id="version" name="version" value="" />
                  </td>
               </tr>              
               <tr>
                  <td align="right">
                     <label for="nbkm">Nbkm :</label>
                  </td>
                  <td>
                     <input type="number" placeholder=" Nbkm" id="nbkm" name="nbkm" />
                  </td>
               </tr>
               <tr>
                  <td></td>
                  <td align="center">
                     <br />
                     <input type="submit" name="forminscription" value="J'ajoute" />
                  </td>
               </tr>
            </table>
         </form>
</body>
</html>