<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');
    if(isset($_SESSION['id']) AND $_SESSION['id'] > 0)
    {
        $getid = intval($_SESSION['id']);
        $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
        $requser->execute(array($getid));
        $userinf = $requser->fetch();
        $_SESSION = array();
        $_SESSION['id'] = $userinf['id'];
        $_SESSION['mail'] = $userinf['mail'];
        $_SESSION['nom'] = $userinf['nom'];
        $_SESSION['prenom'] = $userinf['prenom'];
        $_SESSION['date'] = $userinf['date'];
        $_SESSION['genre'] = $userinf['genre'];
        $_SESSION['avatar'] = $userinf['avatar'];
        $_SESSION['specialite'] = $userinf['specialite'];
        $_SESSION['attribut'] = $userinf['attribut'];
        $_SESSION['parcours'] = $userinf['parcours'];
        
    
    header('Location:profil.php?id='.$_SESSION['id']);
    }
?>