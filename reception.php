<?php
    include('php/header.php');

    if(isset($_SESSION['id']) AND !empty($_SESSION['id']))
    {
    $msg = $bdd->prepare('SELECT * FROM messages WHERE id_destinataire = ? ORDER BY id DESC');
    $msg->execute(array($_SESSION['id']));
    $msg_nbr = $msg->rowCount();
?>

<!-- Contenu principal -->

<div class="container">
    
    <!-- Titre -->
    <div class="panel panel-default">
        <div class="panel-heading panel-page-title">
            <span class="glyphicon glyphicon-envelope"></span>
            Vos messages
        </div>
    </div>
    <!-- /#titre -->
    
    <!-- Panel reception -->
    <div class="jumbotron custom-jumbotron panel-reception">

        <!-- Navigation -->
        <nav class="navbar navbar-default">
            <!-- Header : collapse pour les écrans réduits -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="reception-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
            </div>
            <!-- /#header -->

            <!-- Barre de navigation -->
            <div class="collapse navbar-collapse" id="reception-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <p class="navbar-btn">
                            <a href="profil.php?id=<?= $_SESSION['id'] ?>" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span>Profil</a>
                        </p>
                    </li>
                    <li>
                        <p class="navbar-btn">
                            <a href="envoi.php" class="btn btn-info"><span class="glyphicon glyphicon-envelope"></span>Envoyer un message</a>
                        </p>
                    </li>
                    <li>
                        <p class="navbar-btn">
                            <form method="POST" action="lu.php">
                                <button type="submit" class="btn btn-warning">
                                    <span class="glyphicon glyphicon-eye-open"></span>
                                    Marquer comme lus
                                </button>
                            </form>
                        </p>
                    </li>
                </ul>
            </div>
            <!-- /#barre-de-navigation -->
        </nav>
        <!-- /#navigation -->

        <hr class="divider">

        <div class="row">
            <div class="col-md-12">
                <?php 
                    if($msg_nbr == 0){ echo "Vous n'avez aucun message ..."; }
                    while($m = $msg->fetch()) {
                    $p_exp = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
                    $p_exp->execute(array($m['id_expediteur']));
                    $donnees_exp = $p_exp->fetch();
                    $mail_exp = $donnees_exp['mail'];
                ?>
                    <!-- Message -->
                    <div class="media media-middle reception-list" id="msg_1">
                        <a href="lecture.php?id=<?= $m['id'] ?>" class="msg-anchor">
                            <span class="pull-left">
                                <img class="img-circle media-object" src="img/avatars/<?php echo $donnees_exp['avatar'];?>" alt="Erreur chargement image">
                            </span>
                            <div class="media-body media-middle">
                                <h5 class="media-heading"><?php echo $mail_exp;?></h5>
                                <span class="label label-info"><?php echo $donnees_exp['attribut'];?></span>
                                <small class="text-muted"><span class="glyphicon glyphicon-time"></span><?php echo $m['dateEnvoi']; ?></small>
                                <?php if($m['lu'] == 0){ ?>
                                <p>Vous avez reçu un message !</p>
                                <?php } else { ?>
                                <p class="msg-lu">Vous avez reçu un message !</p> <?php } ?>
                            </div>
                        </a>
                    </div>
                    <!-- /#message -->
                <hr class="divider">
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- /#panel-reception -->
</div>

<!-- Contenu principal -->

<?php
    include('chatbox.php');
    include('php/footer.php');
    }
?>
