<?php
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');
    include('php/header-login.php');
// Traitement du changement de mdp
if(isset($_POST['enregistrer'])){
    if(isset($_POST['mdp1'],$_POST['mdp2'])){
        $verif_confirme=$bdd->prepare('SELECT confirme FROM recuperation WHERE mail=?');
        $verif_confirme->execute(array($_SESSION['email']));
        $verif_confirme=$verif_confirme->fetch();
        $verif_confirme=$verif_confirme['confirme'];
        if($verif_confirme==1){
            $mdp1=htmlspecialchars($_POST['mdp1']);
            $mdp2=htmlspecialchars($_POST['mdp2']);
            if(!empty($mdp1) AND !empty($mdp2)){
                if($mdp1==$mdp2){
                    $mdp1=sha1($mdp1);
                    // Changement du mdp
                    $insert_mdp = $bdd->prepare('UPDATE membres SET motdepasse=? WHERE mail=?');
                    $insert_mdp->execute(array($mdp1,$_SESSION['email']));
                    // Suppression du mail de la table récupération
                    $del_req=$bdd->prepare('DELETE FROM recuperation WHERE mail=?');
                    $del_req->execute(array($_SESSION['email']));
                    // Redirection vers la page de connexion
                    header("Location:index.php");
                }else{
                    $_SESSION['erreur']="Vos mots de passes ne correspondent pas";
                }
            }else{
                $_SESSION['erreur']="Veuillez remplir tous les champs";
            }
        }else{
            $_SESSION['erreur']="Veuillez valider votre mail grâce au code de vérification qui vous a été envoyé par mail";
        }
    }else{
        $_SESSION['erreur']="Veuillez remplir tous les champs";
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
            <span class="msg-alert">Nouveau mot de passe</span>
        </div>
        <!-- /#alert -->
        <form class="form-group" method="post">
            <input class="form-control" type="password" name="mdp1" placeholder="Nouveau mot de passe" /><br />
            <input class="form-control" type="password" name="mdp2" placeholder="Confirmation mot de passe" />
            <input  class="btn btn-primary" type="submit" name="enregistrer" value="Enregistrer" />

        </form>
    </div>
</div>
<?php
    include('php/footer.php');
?>
