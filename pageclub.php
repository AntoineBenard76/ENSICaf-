<?php
    include('php/header.php');
    if(isset($_GET['nb'])){
    $sql=$bdd->query('SELECT * FROM clubs where id='.$_GET['nb'].'');
    $res=$sql->fetch();
?>

<meta charset="utf-8">
<legend>
    <span class="glyphicon glyphicon-pawn"></span>
    <span class="text-uppercase">club <?php echo $res['nom']; ?></span>
</legend>

<div class="container">
    <div class="jumbotron custom-jumbotron panel-page-club">

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
                            <a href="club.php" class="btn btn-primary">
                                <span class="glyphicon glyphicon-pawn"></span>Liste des clubs
                            </a>
                        </p>
                    </li>
                    <li>
                        <!--<p class="navbar-btn">
                            <a href="#" class="btn btn-warning">
                                <span class="glyphicon glyphicon-envelope"></span>Autre option ?
                            </a>
                        </p>-->
                    </li>
                </ul>
            </div>
            <!-- /#barre-de-navigation -->
        </nav>
        <!-- /#navigation -->

        <hr class="divider">

        <div class="row">
            <!-- Infos club -->
            <div class="col-lg-4 col-md-4 hidden-sm hidden-xs">
                <div class="panel panel-default panel-info-club">
                    <div class="panel-body">
                        <!-- Image club -->
                        <img class="thumbnail img-responsive center-block" src="img/avatars/<?php echo $res['photo']; ?>" alt="img_club.png">
                        <hr>

                        <!-- Description -->
                        <h4><strong>Description</strong></h4>
                        <p><?php echo $res['description']; ?></p>
                        <hr>

                        <!-- Réalisations -->
                        <h4><strong>Réalisations</strong></h4>
                        <p><?php echo $res['realisation']; ?></p>
                        <hr>

                        <!-- Président -->
                        <h4><strong>Président</strong></h4>
                        <p><?php echo $res['president']; ?></p>
                        <hr>

                        <!-- Membres -->
                        <h4><strong>Membres</strong></h4>
                        <p><?php echo $res['membres']; ?></p>
                    </div>
                </div>
            </div>
            <!-- /#infos-club -->

            <!-- Contenu principal -->
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <!-- Description pour petits écrans -->
                <div class="hidden-lg hidden-md hidden-description-club">
                    <h4><strong>Description</strong></h4>
                    <p><?php echo $res['description']; ?></p>
                    <hr>
                </div>
                <!-- /#description -->

                <!-- Liste d'événements -->
                <!-- /!\ id à changer en ligne 116 et 123 pour chaque panel généré /!\ -->
                <div class="panel-group panel-event-list" id="accordion" role="tablist" aria-multiselectable="true">
                    <!-- Evenement 1 -->
                    <div class="panel panel-default">
                        <!-- Header -->
                        <div class="panel-heading">
                            <a class="accordion-toggle btn-block" data-toggle="collapse" href="#collapseEvent_1">
                                <h4><?= $res['nomEvenement'];?></h4>
                                <span class="pull-right date-event-club">Date <span class="glyphicon glyphicon-calendar"></span></span>
                            </a>
                        </div>

                        <!-- Contenu -->
                        <div id="collapseEvent_1" class="panel-collapse collapse in" role="tabpanel">
                            <div class="panel-body">
                                <p><?= $res['evenements'];?></p>
                            </div>
                        </div>
                    </div>
                    <form method="POST" action="traitementEvenement.php?nb=<?php echo $res['id']; ?>">
                                <input type="text" name="nomEvent" placeholder="Nom de l'évènement"/>
                                
                                <textarea name="descEvent"  placeholder="Descriptif de l'évènement"></textarea>
                                <input type="submit" name="sauvegarder" value="Sauvegarder les changements"/>
                    </form>
                    <!-- /#evenement 1 -->

                </div>
                <!-- /#liste-d'événements -->
            </div>
            <!-- /#contenu-principal -->
        </div>
    </div>
</div>
<!-- /#container -->

<?php
    } if(isset($_GET['nbr'])) {
        $sql=$bdd->query('SELECT * FROM clubs where id='.$_GET['nbr'].'');
        $res=$sql->fetch();
?>

<meta charset="utf-8">
<legend>
    <span class="glyphicon glyphicon-pawn"></span>
    <span class="text-uppercase">club <?php echo $res['nom']; ?></span>
</legend>

<div class="container">
    <div class="jumbotron custom-jumbotron panel-page-club">

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
                            <a href="club.php" class="btn btn-primary">
                                <span class="glyphicon glyphicon-pawn"></span>Liste des clubs
                            </a>
                        </p>
                    </li>
                    <li>
                        <!--<p class="navbar-btn">
                            <a href="#" class="btn btn-warning">
                                <span class="glyphicon glyphicon-envelope"></span>Autre option ?
                            </a>
                        </p>-->
                    </li>
                </ul>
            </div>
            <!-- /#barre-de-navigation -->
        </nav>
        <!-- /#navigation -->

        <hr class="divider">

        <div class="row">
            <!-- Infos club -->
            <div class="col-lg-4 col-md-4 hidden-sm hidden-xs">
                <div class="panel panel-default panel-info-club">
                    <div class="panel-body">
                        <!-- Image club -->
                        <img class="thumbnail img-responsive center-block" src="img/avatars/<?php echo $res['photo']; ?>" alt="img_club.png">
                        <hr>

                        <!-- Description -->
                        <h4><strong>Description</strong></h4>
                        <p><?php echo $res['description']; ?></p>
                        <hr>

                        <!-- Réalisations -->
                        <h4><strong>Réalisations</strong></h4>
                        <p><?php echo $res['realisation']; ?></p>
                        <hr>

                        <!-- Président -->
                        <h4><strong>Président</strong></h4>
                        <p><?php echo $res['president']; ?></p>
                        <hr>

                        <!-- Membres -->
                        <h4><strong>Membres</strong></h4>
                        <p><?php echo $res['membres']; ?></p>
                    </div>
                </div>
            </div>
            <!-- /#infos-club -->

            <!-- Contenu principal -->
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <!-- Description pour petits écrans -->
                <div class="hidden-lg hidden-md hidden-description-club">
                    <h4><strong>Description</strong></h4>
                    <p><?php echo $res['description']; ?></p>
                    <hr>
                </div>
                <!-- /#description -->

                <!-- Liste d'événements -->
                <!-- /!\ id à changer en ligne 116 et 123 pour chaque panel généré /!\ -->
                <div class="panel-group panel-event-list" id="accordion" role="tablist" aria-multiselectable="true">
                    <!-- Evenement 1 -->
                    <div class="panel panel-default">
                        <!-- Header -->
                        <div class="panel-heading">
                            <a class="accordion-toggle btn-block" data-toggle="collapse" href="#collapseEvent_1">
                                <h4><?= $res['nomEvenement'];?></h4>
                                <span class="pull-right date-event-club">Date <span class="glyphicon glyphicon-calendar"></span></span>
                            </a>
                        </div>

                        <!-- Contenu -->
                        <div id="collapseEvent_1" class="panel-collapse collapse in" role="tabpanel">
                            <div class="panel-body">
                                <p><?= $res['evenements'];?></p>
                            </div>
                        </div>
                    </div>
                    <!-- OLIVIER ICIIIIIIIIIIIIIII LE FORMULAIRE MOCHE-->
                    <form method="POST" action="traitementEvenement.php?nb=<?php echo $res['id']; ?>">
                                <input type="text" name="nomEvent" placeholder="Nom de l'évènement"/>
                                
                                <textarea name="descEvent"  placeholder="Descriptif de l'évènement"></textarea>
                                <input type="submit" name="sauvegarder" value="Sauvegarder les changements"/>
                    </form>
                    <!-- /#evenement 1 -->

                </div>
                <!-- /#liste-d'événements -->
            </div>
            <!-- /#contenu-principal -->
        </div>
    </div>
</div>
<?php
    }
    include('chatbox.php');
    include('php/footer.php');
?>