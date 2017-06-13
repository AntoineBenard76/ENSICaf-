<?php
    include('php/header.php');
?>

<!-- Contenu principal -->

<div class="container">
    
    <!-- Titre -->
    <div class="panel panel-default">
        <div class="panel-heading panel-page-title">
            <span class="glyphicon glyphicon-envelope"></span>
            Envoyer un message
        </div>
    </div>
    <!-- /#titre -->
    
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
                            <a href="profil.php?id=<?= $_SESSION['id']?>" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span>Profil</a>

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
                <form class="form-envoi" method="POST" action="traitementEnvoi.php">
                    <!-- Destinataire -->
                    <label class="col-md-2 control-label envoi-destinataire">Destinataire</label>
                    <div class="col-md-4">
                        <select class="form-control" name="destinataire">

                <?php
                    $destinataires=$bdd->query('SELECT mail FROM membres ORDER BY mail');
                    if(isset($_GET['r']) AND !empty($_GET['r']))
                    {
                        $r = htmlspecialchars($_GET['r']);?>
                        <option><?= $r ;?></option>
                    <?php }
                    else { while($d = $destinataires->fetch()) { 
                ?>
                <option><?= $d['mail']; ?></option>
                <?php 
                    }
                }
                ?>
                        </select>
                    </div>
                    <!-- /#destinataire -->

                    <!-- Input -->
                    <textarea class="form-control" name="message" rows="4"></textarea>
                    <button type="submit" class="btn btn-warning btn-envoi" name="envoi_message">Envoyer</button>
                    <button type="reset" class="btn btn-danger btn-envoi">Annuler</button>
                    <?php
                if(isset($_SESSION['error'])) { echo '<span style="color:red">'.$_SESSION['error'].'</span>'; $_SESSION['error'] = "";}
            ?>
                    <!-- /#input -->
                </form>
            </div>
        </div>
        <!-- /#Envoyer un message -->
    </div>
</div>

<!-- Contenu principal -->

<?php
    include('chatbox.php');
    include('php/footer.php');
    //}
?>