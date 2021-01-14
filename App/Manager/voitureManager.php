<?php 
//include_once '../Entity/voiture.php';

 
    //use \App\Entity\voitureManager;
    namespace App\Manager;
   // use PDO;

    use \App\Entity\Voiture;

class VoitureManager{
    private $pdo;
    private $pdoStatement;

    public function __construct(){
        //$this->pdo = new PDO('mysql: host= localhost; dbname= phpcrud','root','  ');

        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'root';
        $DATABASE_PASS = '';
        $DATABASE_NAME = 'phpcrud';
        try {
            return $this->pdo = new \PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
             var_dump($this->pdo);

        } catch (\PDOException $exception) {
            // If there is an error with the connection, stop the script and display the error.
            exit('Failed to connect to database!');
        }
    }
    /** */
    
    public function read($id){

        $this->pdoStatement =  $this->pdo->prepare("SELECT * FROM `voiture` WHERE `id` = :id");  

        $this->pdoStatement->bindValue(':id', $id, \PDO::PARAM_INT);
        $executeIsok = $this->pdoStatement->execute();
       // $row = $this->pdoStatement->fetchAll();

       // var_dump($executeIsok);
      // exit();
        // if (!empty($row)) {
        //     return $row[0];
      
        // }
        if(isset($executeIsok)){
            $voiture = $this->pdoStatement->fetchObject('App\Entity\Voiture');
           // var_dump($voiture );

            if($voiture === false){
                $msg='pas de resultat';
               return $msg; 
            }else{
            return $voiture;
            }
        }else{
            return false;
        }
    
    }
////////////////////////////////////////////////////////////////////////////////////
    public function readAll(){
        $this->pdoStatement =  $this->pdo->query("SELECT * FROM `voiture` WHERE id ");  
       // $voitures =[];
        while($voiture = $this->pdoStatement->fetchObject('App\Entity\voiture')){
            $voitures[] = $voiture;

        }
        if ($voitures == false){
            echo 'pas de donner';
        }else{
            //var_dump($voitures);

            return $voitures;

        }
    }

    /////////////////////////////////////////////////////////////

    private function create(voiture $voiture){
        $this->pdoStatement = $this->pdo->prepare("INSERT INTO `voiture` (`id`, `marque`, `modele`, `annee`, `version`, `nbkm`) VALUES (NULL, ?, ?, ?, ?, ?)");

        $marque = $voiture->getMarque();
        $modele=  $voiture->getModele();
        $annee =  $voiture->getAnnee();
        $version =  $voiture->getVersion();
        $nbkm = $voiture->getNbkm();
       //var_dump($nbkm);

       
   //  $version =  $this->pdoStatement->bindValue(':username', $voiture->getVersion(), \PDO::PARAM_STR);


       $executeIsok = $this->pdoStatement->execute([$marque, $modele, $annee, $version, $nbkm]);
      
       var_dump($executeIsok);


        if($executeIsok){
            $voiture = $this->pdoStatement->fetchObject('App\Entity\voiture');
            if($voiture === false){
                $msg ="j'ai aucune valeur".var_dump($voiture);
               return $msg; 
            }
        }else{
            $id = $this->pdo->lastInsertId();
            $voiture = $this->read($id);

            return false;
        }
    }

/////////////////////////////////////////////////////////////////////////////
    
  

    private function update(Voiture $voiture){

        $this->pdoStatement = $this->pdo->prepare("UPDATE `voiture` SET `marque` = ?, `modele` = ?, `annee` = ?, `version` = ?, `nbkm` = ? WHERE `voiture`.`id` = ? ");

        // $marque =  $this->pdoStatement->bindValue(':marque', $voiture->getMarque(), \PDO::PARAM_STR);
        // $modele= $this->pdoStatement->bindValue(':modele', $voiture->getModele(), \PDO::PARAM_STR);
        // $annee = $this->pdoStatement->bindValue(':annee', $voiture->getAnnee(), \PDO::PARAM_STR);
        // $version = $this->pdoStatement->bindValue(':version', $voiture->getVersion(), \PDO::PARAM_STR);
        // $nbkm = $this->pdoStatement->bindValue(':nbkm', $voiture->getNbkm(), \PDO::PARAM_STR);
        // $id = $this->pdoStatement->bindValue(':id', $voiture->getId(), \PDO::PARAM_INT);

        //$this->pdoStatement->execute([$id]);

                 $id = $voiture->getId();
              //  var_dump($id);  

                $marque = $voiture->getMarque();
                $modele=  $voiture->getModele();
                $annee =  $voiture->getAnnee();
                $version =  $voiture->getVersion();
                $nbkm = $voiture->getNbkm();
                $executeIsok = $this->pdoStatement->execute([$marque, $modele, $annee, $version, $nbkm, $id]);
      
        var_dump($executeIsok);
 
 
         if($executeIsok  === false){
                 $msg ="j'ai aucune valeur" ;
                // var_dump($voiture);
                return $msg; 
         }else{
             $id = $this->pdo->lastInsertId();
            // $voiture = $this->read($id);
 
             return $executeIsok;
         }

    }

    public function delete(Voiture $voiture){
        $this->pdoStatement = $this->pdo->prepare("DELETE FROM  voiture WHERE id=:id LIMIT 1 ");
        
       $this->pdoStatement->bindValue(':id', $voiture->getId(),\PDO::PARAM_INT);
        return $this->pdoStatement->execute();
    }



    public function save( Voiture $voiture){

        if(is_null($voiture->getId())){
            echo 'nouveau object';
            return $this->create($voiture);
        }else{ 
            echo ' existe';

            return $this->update($voiture);
        }
    }
   }