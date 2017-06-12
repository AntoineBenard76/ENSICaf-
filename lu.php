<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');
    $un = 1;
    $updatenonlu = $bdd->prepare('UPDATE messages SET lu = ? WHERE id_destinataire = ?');
    $updatenonlu->execute(array($un, $_SESSION['id']));
    header('Location: reception.php');
?>