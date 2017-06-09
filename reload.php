<?php
    session_start();
    if(isset($_SESSION['id']) AND $_SESSION['id'] > 0)
    {
        $getid = intval($_SESSION['id']);
        $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
        $requser->execute(array($getid));
        $userinfo = $requser->fetch();
    $_SESSION = array();
    
    header("Location: index.php");
?>