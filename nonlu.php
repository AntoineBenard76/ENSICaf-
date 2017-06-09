<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');
    $zero = 0;
    $updatenonlu = $bdd->prepare('UPDATE messages SET lu = ? WHERE id_destinataire = ?');
    $updatenonlu->execute(array($zero, $_SESSION['id']));
    header('Location: reception.php');
?>