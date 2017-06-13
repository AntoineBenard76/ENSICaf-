<?php 
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');
include('php/header-login.php');

if ( isset($_GET['section']) ) {
    $_SESSION['section'] = htmlspecialchars($_GET['section']);
} else {
    $_SESSION['section'] = "";
}

if ( isset($_POST['envoyer']) ) {
    $_SESSION['email'] = htmlspecialchars($_POST['email']);
} ?>

<div class="container">
    <div class="jumbotron custom-jumbotron-mdp">

    <?php
    if ( $_SESSION['section'] == 'code' ) { ?>
    <!-- Alert -->
    <div class="alert alert-info alert-dismissable" role="alert" align="center">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <span class="msg-alert">Un code de vérification vous a été envoyé.</span>
    </div>
    <!-- /#alert -->

    <form class="form-group" method="post" action="traitementmdp.php">
        <label for="code">Votre code de vérification : </label>
        <input class="form-control" type="text" name="code" placeholder="Code de vérification" />
        <input type="submit" name="envoyer_code" value="Envoyer" />
    </form>

    <?php } elseif ($_SESSION['section']=="changemdp") { ?>
    <!-- Alert -->
    <div class="alert alert-info alert-dismissable" role="alert" align="center">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <span class="msg-alert">Nouveau mot de passe</span>
    </div>
    <!-- /#alert -->
    <form class="form-group" method="post" action="traitementmdp.php">
        <input class="form-control" type="password" name="mdp1" placeholder="Nouveau mot de passe" /><br />
        <input class="form-control" type="password" name="mdp2" placeholder="Confirmation mot de passe" />
        <input type="submit" name="enregistrer" value="Enregistrer" />
        
    </form>

    <?php } else { ?>
    <form class="form-group" method="post" action="traitementmdp.php">
        <label>Votre mail UHA</label>
        <input class="form-control" type="mail" name="email" placeholder="prenom.nom@uha.fr" />
        <button class="btn btn-primary" type="submit" name="envoyer">Envoyer</button>
    </form>
    <?php } ?>

    <?php   if (isset($_SESSION['erreur'])) {
                echo $_SESSION['erreur'];
            }
    ?>

    </div>
</div>

<?php
    include('php/footer.php');
?>