<?php
    session_start();
    $_SESSION['nb']= $_GET['nb'];
    try{ // essaie
        $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8','root',''); 
    }
    catch(Exception $e){ 
        die('Erreur : '.$e->getMessage()); 
    }

    if(isset($_POST['sauvegarder'])){
            if(isset($_POST['nomEvent']) AND isset($_POST['descEvent']) AND !empty($_POST['nomEvent']) AND !empty($_POST['descEvent'])) {
                $sql2=$bdd->query('SELECT * FROM clubs where id='.$_SESSION['nb'].'');
                $save = $sql2->fetch();
                $nomEvent = htmlspecialchars($_POST['nomEvent']);
                $descEvent = htmlspecialchars($_POST['descEvent']);
                $reqEvent = $bdd->prepare('UPDATE clubs SET nomEvenement = ?, evenements = ? WHERE id = ?');
                $reqEvent->execute(array($nomEvent,$descEvent,$_GET['nb']));
                header('Location: pageclub.php?nbr='.$save['id']);
            }
    }