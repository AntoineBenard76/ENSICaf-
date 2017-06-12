<?php
    session_start();
    try{ // essaie
        $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8','root',''); 
    }
    catch(Exception $e){ 
        die('Erreur : '.$e->getMessage()); 
    }
    //Gestion like et dislike
    $nb=$bdd->prepare('SELECT nbLike,nbDislike FROM actu WHERE id=?');
    $nb->execute(array($_GET['id']));
    $nb=$nb->fetch();
    if($_GET['name']=='dislike'){
        $dislike=$nb['nbDislike']+1;
        $insert_dislike=$bdd->prepare('UPDATE actu SET nbDislike=? WHERE id=?');
        $insert_dislike->execute(array($dislike,$_GET['id']));
    }
    
    if($_GET['name']=='like'){
        $like=$nb['nbLike']+1;
        $insert_like=$bdd->prepare('UPDATE actu SET nbLike=? WHERE id=?');
        $insert_like->execute(array($like,$_GET['id']));
    }

    //Ajout d'un commentaire
    if($_GET['name']=='commenter'){
        if(isset($_POST['submit_com'])){
            if(isset($_POST['commentaire'])){
                //Récupération des données de l'auteur du commentaire
                $auteur=$bdd->query('SELECT nom,prenom,attribut,avatar FROM membres WHERE "'.$_SESSION['id'].'"=id');
                $auteur=$auteur->fetch();
  
                
                $commentaire=htmlspecialchars($_POST['commentaire']);
                $insert=$bdd->prepare('INSERT INTO commentaire (commentaire,idactu,nomAuteur,prenomAuteur,attributCom,avatar) VALUES (?,?,?,?,?,?)');
                $insert->execute(array($commentaire,$_GET['id'],$auteur['nom'],$auteur['prenom'],$auteur['attribut'],$auteur['avatar']));
            }
        }    
    }
header('Location:accueil.php');
?>