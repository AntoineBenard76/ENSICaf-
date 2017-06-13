<?php
 try{ // essaie
        $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8','root',''); 
    }
    catch(Exception $e){ 
        die('Erreur : '.$e->getMessage()); 
    }

    /*Infos du membre sélectionné*/
    $membre=$bdd->prepare('SELECT * FROM membres WHERE id=?');
    $membre->execute(array($_GET['id']));
    $membre->fetch();

    $nom=$membre['nom'];
    $prenom=$membre['prenom'];
    $photo=$membre['photo'];
    $mail=$membre['mail'];

    $nomclub = htmlspecialchars($_GET['nomgroupe']);
    $sql=$bdd->prepare('INSERT INTO groupe(`nom`,`prenom`,`photo`,`nomclub`,`mail`) VALUES ( :nom, :prenom, :photo, :nomclub, :mail)');    
    $sql->execute(array('nom'=>$nom, 'prenom'=>$prenom, 'photo'=>$photo, 'nomclub'=>$nomclub, 'mail'=>$mail));

    header('Location:groupe.php');
?>