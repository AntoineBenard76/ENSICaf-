<?php
    include('php/header.php');
?>

<!-- Contenu principal -->

<legend>
    <span class="glyphicon glyphicon-envelope"></span>
    Envoyer un message
</legend>

<div class="container">
    <div class="jumbotron custom-jumbotron">
        <!-- Barre de navigation -->
        <nav class="navbar navbar-default">
            <!-- Header : collapse pour les écrans réduits -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="reception-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>
            </div>
            <!-- /#header -->

            <div class="collapse navbar-collapse" id="reception-navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <p class="navbar-btn">
                            <a href="profil.php?id=<?= $_SESSION['id'] ?>" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span>Profil</a>
                        </p>
                    </li>
                    <li>
                        <p class="navbar-btn">
                            <a href="reception.php" class="btn btn-info"><span class="glyphicon glyphicon-envelope"></span>Boîte de réception</a>
                        </p>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /#barre de navigation -->

        <hr class="divider">

        <!-- Envoyer un message -->
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form class="form-envoi" method="post" action="traitementEnvoi.php">
                    <!-- Destinataire -->
                    <label class="col-md-2 control-label envoi-destinataire">Destinataire</label>
                    <div class="col-md-3">
                        <select class="form-control">
                            <option>Barbapapa</option>
                            <option>Pétanque</option>
                            <option>Whatever</option>
                        </select>
                    </div>
                    <!-- /#destinataire -->

                    <!-- Input -->
                    <textarea class="form-control" rows="4"></textarea>
                    <button type="submit" class="btn btn-warning btn-envoi">Envoyer</button>
                    <button type="reset" class="btn btn-danger btn-envoi">Annuler</button>
                    <!-- /#input -->
                </form>
            </div>
        </div>
        <!-- /#Envoyer un message -->
    </div>
    <!-- /#jumbotron -->




    <!-- ********** à enlever ********** -->
    <div class="jumbotron" style="background-color: white;">
        <form method="POST" action="traitementEnvoi.php">
            <label> Destinataire :</label>
            <select name="destinataire">
                <?php
                    $destinataires=$bdd->query('SELECT mail FROM membres ORDER BY mail');
                    while($d = $destinataires->fetch()) { 
                ?>
                <option><?= $d['mail'] ?></option>
                <?php } ?>
            </select>
            <!---->
            <br /><br />
            <textarea placeholder="Votre message" name="message"></textarea>
            <br /><br />
            <input type="submit" value="Envoyer" name="envoi_message"/>
            <br /><br />
            <?php
                if(isset($_SESSION['erreur'])) { echo '<span style="color:red">'.$_SESSION['erreur'].'</span>'; }
            ?>
        </form>
        <br />
        <a href="reception.php"> Boîte de réception </a>&nbsp;&nbsp;
        <a href="profil.php?id=<?= $_SESSION['id']?>">Retour au profil</a>

    </div>
    <!-- ********** /#à enlever ********** -->

</div>

<!-- Contenu principal -->

<?php
    include('chatbox.php');
    include('php/footer.php');
    //}
?>