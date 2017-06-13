<?php
    include('php/header.php');
    try{ // essaie
        $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8','root',''); 
    }
    catch(Exception $e){ 
        die('Erreur : '.$e->getMessage()); 
    }
?>
<!--Recupération du nom du groupe-->
<form method="get">
    <label>Nom du groupe</label>
    <input type=text name="nomgroupe" placeholder="nom du groupe"/>
    <br/>
    <input type="submit" name="enregistrer" value="enregistrer" />
</form>
<?php if(isset($_GET['nomgroupe']) AND !empty($_GET['nomgroupe'])){

?>
    <p>Ajouter des membres au cercle : <?php echo utf8_decode($_GET['nomgroupe']);}?></p>
<!--Proposition d'ajout de membre-->
<?php
                                                                  
    $cercle = $bdd->query('SELECT * FROM membres');

     //foreach ($cercle as $value){
     /*echo '<form method="POST"> <p>'.$value['nom']."\n".$value['prenom']."\n".$value['photo']."\n".'<input type="submit" name="plus" value='.$value['id'].'></p></form>';*/
    while($value=$cercle->fetch()){
?>
        <div>
            <!--<img class="[ img-circle pull-left ]" src="img/avatars/<?php echo $value['avatar']; ?>" alt="profile.jpg"/>-->
            <p><?php echo utf8_decode($value['nom'])."  ".utf8_decode($value['prenom']) ?><a href="ajoutCercle.php?name=<?php echo $_GET['nomgroupe'];?>&id=<?php echo $value['id']; ?>"><input type="submit" name="plus" value="+"></a></p>
        </div>
<?php
    
         /*if(isset($_POST["plus"])){
             $nom=$value['nom'];
             $prenom=$value['prenom'];
             $photo=$value['photo'];
             $mail=$value['mail'];
             if(!empty($_POST['nomclub'])){

                  $nomclub = htmlspecialchars($_POST['nomclub']);
                 if(isset($_POST['enregistrer'])){
                  try{ $sql=$bdd->prepare('INSERT INTO groupe(`nom`,`prenom`,`photo`,`nomclub`,`mail`) VALUES ( :nom, :prenom, :photo, :nomclub, :mail)');    
                  $sql->execute(array('nom'=>$nom, 'prenom'=>$prenom, 'photo'=>$photo, 'nomclub'=>$nomclub, 'mail'=>$mail));}
                    catch(PDOException $e){
                        die('Error : '.$e->getMessage());
            }
           }
          }
        }*/
    
     //}

?>



<?php 
}
 include('php/footer.php'); 
?>