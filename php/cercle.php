<?php
 try{ // essaie
        $bdd = new PDO('mysql:host=localhost;dbname=ensicafé;charset=utf8','root',''); 
    }
    catch(Exception $e){ 
        die('Erreur : '.$e->getMessage()); 
    }

 include('header.php');
 $cercle = $bdd->query('SELECT * FROM profil');
 $bdd->query('CREATE TABLE appartient(idprofil integer references profil(id) on delete cascade, idgroupe integer references groupe(id) on delete cascade, primary key (idprofil,idgroupe))');
 foreach ($cercle as $value){
     echo '<form method="POST"> <p>'.$value['nom']."\n".$value['prenom']."\n".$value['photo']."\n".'<input type="submit" name="plus" value="+" /></p></form>';
     
     if(isset($_POST['plus'])){
         $idprofil=$value['id'];
         $nom=$value['nom'];
         $prenom=$value['prenom'];
         $photo=$value['photo'];
         try{ $sql=$bdd->prepare('INSERT INTO groupe(`id`,`nom`,`prenom`,`photo`) VALUES (NULl, :nom, :prenom, :photo)');      
              $sql->execute(array('nom'=>$nom, 'prenom'=>$prenom, 'photo'=>$photo));}
          catch(PDOException $e){
                die('Error : '.$e->getMessage());
          }
         try{ $s=$bdd->prepare('INSERT INTO appartient(idprofil,idgroupe) VALUES (:idprofil, NULL)');      
              $s->execute(array('idprofil'=>$idprofil));}
          catch(PDOException $e){
                die('Error : '.$e->getMessage());
          }
     }
 }
?>

<?php 
 include('footer.php'); 
?>