<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');
    if(isset($_SESSION['id']))
    {
        $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
        $requser->execute(array($_SESSION['id']));
        $user = $requser->fetch();
        
        if(isset($_POST['newmail']) AND !empty($_POST['newmail']))
        {
            $newmail = htmlspecialchars($_POST['newmail']);
            $insertmail = $bdd->prepare("UPDATE membres SET mail = ? WHERE id = ?");
            $insertmail->execute(array($newmail, $_SESSION['id']));
            header('Location: reload.php?id='.$_SESSION['id']);
        }
        
        if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2']))
        {
            $mdp1 = sha1($_POST['newmdp1']);
            $mdp2 = sha1($_POST['newmdp2']);
            if($mdp1 == $mdp2)
            {
                $insertmdp = $bdd->prepare('UPDATE membres SET motdepasse = ? WHERE id = ?');
                $insertmdp->execute(array($mdp1, $_SESSION['id']));
                header('Location: reload.php?id='.$_SESSION['id']);
            }
            else 
            {
                $msg = "Vos deux mots de passe ne correspondent pas.";   
            }
        }
        
        if(isset($_POST['newspecialite']) AND !empty($_POST['newspecialite']))
        {
            $newspecialite = htmlspecialchars($_POST['newspecialite']);
            $insertmail = $bdd->prepare("UPDATE membres SET specialite = ? WHERE id = ?");
            $insertmail->execute(array($newspecialite, $_SESSION['id']));
            header('Location:reload.php?id='.$_SESSION['id']);
        }

        if(isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name']))
        {
            $taillemax = 2097152;
            $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
            if($_FILES['avatar']['size'] <= $taillemax)
            {
                $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                if(in_array($extensionUpload, $extensionsValides))
                {
                    $chemin = "img/avatars/".$_SESSION['id'].".".$extensionUpload;
                    $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                    if($resultat)
                    {
                        $updateavatar = $bdd->prepare('UPDATE membres SET avatar = :avatar WHERE id = :id'); 
                        $updateavatar->execute(array(
                            'avatar' => $_SESSION['id'].".".$extensionUpload,
                            'id' => $_SESSION['id']
                        ));
                        //header('Location:reload.php?id='.$_SESSION['id']);
                    }
                    else
                    {
                        $msg = "Erreur durant l'importation de votre photo de profil";   
                    }
                }
                else
                {
                    $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png.";  
                }
            }
            else
            {
                $msg = "Votre photo de profil ne doit pas dépasser 2 Mo.";
            }
        }
        if(isset($_POST['newparcours']) AND !empty($_POST['newparcours']))
        {
            $newparcours = htmlspecialchars($_POST['newparcours']);
            $insertparcours = $bdd->prepare("UPDATE membres SET parcours = ? WHERE id = ?");
            $insertparcours->execute(array($newparcours, $_SESSION['id']));
            header('Location:reload.php?id='.$_SESSION['id']);
        }

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
        
    } else {
        header("Location:index.php");
    }
?>