<?php
    try{ // essaie
        $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8','root',''); 
    }
    catch(Exception $e){ 
        die('Erreur : '.$e->getMessage()); 
    }

    if(isset($_POST['enregistrer'])){
        $nom = htmlspecialchars($_POST['nom']);   
        $description = htmlspecialchars($_POST['description']);   
        $photo = htmlspecialchars($_POST['photo']);   
        $membres = htmlspecialchars($_POST['membres']);   
        $nompres = htmlspecialchars($_POST['nompres']);   
        $realisations = htmlspecialchars($_POST['realisations']);   
        $evenements = "A venir";
        $nomEvenement = "A choisir";
        $sql=$bdd->prepare('INSERT INTO clubs(nom,description,photo,membres,president,realisation,evenements,nomEvenement) VALUES (?,?,?,?,?,?,?,?)');
        $sql->execute(array($nom,$description,$photo,$membres,$nompres,$realisations,$evenements,$nomEvenement));
    }
    header("Location:club.php");
?>