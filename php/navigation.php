<?php 
    $valeur = 0;
    $reqmes = $bdd->prepare('SELECT * FROM messages WHERE id_destinataire = ? AND lu = ?');
    $reqmes->execute(array($_SESSION['id'], $valeur));
    $mescount = $reqmes->rowCount();
?>
<!-- Navbar : barre de navigation en haut -->
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="col-sm-7 col-md-5">
            <div class="navbar-header">
                <a class="navbar-brand" href="accueil.php"><img src="img/logo_ensicafe.png" id="img-logo" alt="img/logo_ensicafe.png"><small class="text-muted" id="slogan">le réseau social dopé à la caféine</small></a>
            </div>
        </div>
        <div class="col-sm-5 col-md-7">
            <div class="navigation-options">
                <ul class="nav navbar-nav pull-right">

                    <li><a href="accueil.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
                    <li><a href="reception.php"><span class="glyphicon glyphicon-envelope"></span> Messages <?php $mescount = $reqmes->rowCount(); if($mescount > 0){ ?><span class="label label-danger label-as-badge"><?php echo $mescount; ?></span> <?php } ?></a></li>
                    <li><a href="deconnexion.php"><span class="glyphicon glyphicon-log-out"></span> Déconnexion</a></li>

                </ul>
            </div>
        </div>
    </div>
</nav>