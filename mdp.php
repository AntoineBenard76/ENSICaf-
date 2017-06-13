<?php 
session_start();
$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');
include('php/header-login.php');

/*if ( isset($_GET['section']) ) {
    $_SESSION['section'] = htmlspecialchars($_GET['section']);
} else {
    $_SESSION['section'] = "";
}*/

/*if ( isset($_POST['envoyer']) ) {
    $_SESSION['email'] = htmlspecialchars($_POST['email']);
} */?>

<div class="container">
    <div class="jumbotron custom-jumbotron-mdp">

    <form class="form-group" method="post" action="traitementmdp.php">
        <label>Votre mail UHA</label>
        <input class="form-control" type="email" name="email" placeholder="prenom.nom@uha.fr" />
        <button class="btn btn-primary" type="submit" name="envoyer">Envoyer</button>
    </form>

    <?php   if (isset($_SESSION['erreur'])) {
                echo $_SESSION['erreur'];
            }
    ?>

    </div>
</div>

<?php
    include('php/footer.php');
?>