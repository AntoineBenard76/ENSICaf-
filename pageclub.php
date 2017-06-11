<?php
    try{ // essaie
        $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8','root',''); 
    }
    catch(Exception $e){ 
        die('Erreur : '.$e->getMessage()); 
    }
    include('php/header.php');
    $sql=$bdd->query('SELECT * FROM clubs where id='.$_GET['nb'].'');
    //echo $_GET['nb'];
    $res=$sql->fetch();
    echo '<p>Nom du club : '.$res['nom'].'</p>';
    echo '<p>'.$res['photo'].'</p>';
    echo '<p>Présidé par : '.$res['president'].'</p>';
    echo '<p>Composé de : '.$res['membres'].' membres</p>';
    echo '<p>Description : '.$res['description'].'</p>';
    echo '<p>Realisations : '.$res['realisations'].'</p>';
    echo '<p>Evenements : '.$res['evenements'].'</p>';
    include('php/footer.php');
?>