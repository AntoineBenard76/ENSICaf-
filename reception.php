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

    <!-- à enlever -->
    <div class="jumbotron panel-reception">
        <legend>Vos messages</legend>

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
                </ul>
            </div>
            <!-- /#barre-de-navigation -->
        </nav>

        <hr class="divider">

<!--         <table id="clickable-table"> -->
            <div class="row">
                <div class="col-md-12">
                    <!-- Message 1 -->
                    <div class="media media-middle reception-list" id="msg_1">
                        <a href="envoi.php" class="msg-anchor">
                            <span class="pull-left">
                                <img class="img-circle media-object" src="img/profile_test1.png" alt="profile_test1.png">
                            </span>
                            <div class="media-body media-middle">
                                <h5 class="media-heading">Le super chat</h5>
                                <span class="label label-info">Chat</span>
                                <small class="text-muted"><span class="glyphicon glyphicon-time"></span> La date ici</small>
                                <!-- Message non lu -->
                                <p>Vous avez reçu un message !</p>
                            </div>
                        </a>
                    </div>
                    <!-- /#message 1 -->

                    <hr class="divider">

                    <!-- Message 2 -->
                    <div class="media media-middle reception-list" id="msg_2">
                        <a href="envoi.php" class="msg-anchor">
                            <span class="pull-left">
                                <img class="img-circle media-object" src="img/profile_test2.jpg" alt="profile_test2.jpg">
                            </span>
                            <div class="media-body media-middle">
                                <h5 class="media-heading">La super grenouille</h5>
                                <span class="label label-success">Grenouille</span>
                                <small class="text-muted"><span class="glyphicon glyphicon-time"></span> La date ici</small>
                                <!-- Message lu -->
                                <p class="msg-lu">Vous avez reçu un message !</p>
                            </div>
                        </a>
                    </div>
                    <!-- /#message 2 -->
                </div>
            </div>
<!--         </table> -->

        <hr class="divider">

        <?php 
            if($msg_nbr == 0){ echo "Vous n'avez aucun message ..."; }
            while($m = $msg->fetch()) {
            $p_exp = $bdd->prepare('SELECT mail FROM membres WHERE id = ?');
            $p_exp->execute(array($m['id_expediteur']));
            $p_exp = $p_exp->fetch();
            $p_exp = $p_exp['mail'];
        ?>

        <?php echo $m['dateEnvoi']; ?><?php if($m['lu'] == 1){ ?> <i>(Lu)</i> <?php } ?> <b><?= $p_exp ?></b> vous a envoyé <a href="lecture.php?id=<?= $m['id'] ?>">ce message</a> <br />
        --------------------------------------------------------<br/>
        <?php } ?>
    
    <div align="center">
        <form method="POST" action="nonlu.php">
            <input type="submit" value="Marquer tous les messages comme non lus"/>
        </form>    
    </div>
    </div>
    <!-- /#à enlever -->

</div>

<!-- Contenu principal -->

<?php
    include('chatbox.php');
    include('php/footer.php');
    }
?>