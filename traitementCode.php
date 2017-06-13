<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');
    include('php/header-login.php');

    // Traitement du code de récupération
    if(isset($_POST['envoyer_code'],$_POST['code'])){
        if(!empty($_POST['code'])){
            $verif_code=htmlspecialchars($_POST['code']);
            $verif_req=$bdd->prepare('SELECT id FROM recuperation WHERE mail=? AND code=?');
            $verif_req->execute(array($_SESSION['email'],$verif_code));
            $verif_req= $verif_req->rowCount();
            if( $verif_req==1){
                // Update de confirme
                $up_req=$bdd->prepare('UPDATE recuperation SET confirme=1 WHERE mail=?');
                $up_req->execute(array($_SESSION['email']));
    /*            $del_req=$bdd->prepare('DELETE FROM recuperation WHERE mail=?');
                $del_req->execute(array($_SESSION['mail']));*/
                // Redirection vers un formulaire pour modifier le mdp
                header("Location:changermdp.php");
            }else{
               $_SESSION['erreur']="Code invalide"; 
            }
        }else{
            $_SESSION['erreur']="Veuillez indiquer votre code de récupération";
        }
    }
?>
<div class="container">
    <div class="jumbotron custom-jumbotron-mdp">
        <!-- Alert -->
        <div class="alert alert-info alert-dismissable" role="alert" align="center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <span class="msg-alert">Un code de vérification vous a été envoyé.</span>
        </div>
        <!-- /#alert -->

        <form class="form-group" method="post" >
            <label for="code">Votre code de vérification : </label>
            <input class="form-control" type="text" name="code" placeholder="Code de vérification" />
            <input class="btn btn-primary" type="submit" name="envoyer_code" value="Envoyer" />
        </form>
    </div>
</div>