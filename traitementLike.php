<?php
    session_start();
    try{ // essaie
        $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8','root',''); 
    }
    catch(Exception $e){ 
        die('Erreur : '.$e->getMessage()); 
    }
    echo $_SESSION['idactu'];
    if(isset($_POST['dislike'])){
        echo 'test';
        $insert_dislike=$bdd->prepare('UPDATE actu SET nbDislike=\'nbDislike+1\' WHERE id=?');
        $insert_dislike->execute(array($_SESSION['idactu']));
    }
    
    if(isset($_POST['like'])){
        echo 'test like';
        $insert_like=$bdd->prepare('UPDATE actu SET nbLike=\'nbLike+1\' WHERE id=?');
        $insert_like->execute(array($_SESSION['idactu']));
    }
?>