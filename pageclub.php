<?php
    try{ // essaie
        $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8','root',''); 
    }
    catch(Exception $e){ 
        die('Erreur : '.$e->getMessage()); 
    }
    include('php/header.php');
    $sql=$bdd->query('SELECT * FROM clubs where id='.$_GET['nb'].'');
    $res=$sql->fetch();
?>

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
                        <p class="navbar-btn">
                            <a href="#" class="btn btn-warning">
                                <span class="glyphicon glyphicon-envelope"></span>Autre option ?
                            </a>
                        </p>
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
                        <img class="thumbnail img-responsive center-block" src="img/profile_test1.png" alt="img_club.png">
                        <hr>

                        <!-- Description -->
                        <h4><strong>Description</strong></h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <hr>

                        <!-- Réalisations -->
                        <h4><strong>Réalisations</strong></h4>
                        <p>Regrouper des noobs qui feedent sur LoL</p>
                        <hr>

                        <!-- Président -->
                        <h4><strong>Président</strong></h4>
                        <p>Moi</p>
                        <hr>

                        <!-- Membres -->
                        <h4><strong>Membres</strong></h4>
                        <p>Toi, plus moi, plus eux, plus tous ceux qui le veulent, plus lui, plus elle, et tous ceux qui sont seuls</p>
                    </div>
                </div>
            </div>
            <!-- /#infos-club -->

            <!-- Contenu principal -->
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <!-- Description pour petits écrans -->
                <div class="hidden-lg hidden-md hidden-description-club">
                    <h4><strong>Description</strong></h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
                                <h4>Tournoi de morpion !</h4>
                                <span class="pull-right date-event-club">Date <span class="glyphicon glyphicon-calendar"></span></span>
                            </a>
                        </div>

                        <!-- Contenu -->
                        <div id="collapseEvent_1" class="panel-collapse collapse in" role="tabpanel">
                            <div class="panel-body">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /#evenement 1 -->

                    <!-- Evenement 2 -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a class="accordion-toggle btn-block" data-toggle="collapse" href="#collapseEvent_2">
                                <h4>Podcast Minecraft avec DylanDu68200</h4>
                                <span class="pull-right date-event-club">Date <span class="glyphicon glyphicon-calendar"></span></span>
                            </a>
                        </div>

                        <div id="collapseEvent_2" class="panel-collapse collapse in" role="tabpanel">
                            <div class="panel-body">
                                <p>Venez nombreux !</p>
                            </div>
                        </div>
                    </div>
                    <!-- /#evenement 2 -->
                </div>
                <!-- /#liste-d'événements -->
            </div>
            <!-- /#contenu-principal -->
        </div>
    </div>
</div>
<!-- /#container -->









<div class="club-panel">
    <div class="club-panel">
        <div class="club-title">
            <div class="club-caption">
				<span class="caption-name text-uppercase"><?php echo $res['nom']; ?></span>
                <p><?php echo $res['president']; ?></p>
            </div>
        </div>
    </div>
    <div class="club-body"><br>
        <div class="media">
            <div class="media-left">
                <img class="media-object" src="img/avatars/<?php echo $res['photo']; ?>" alt="photo_club" />
            </div>
            <!--Peu de style--> 
            <div class="media-body">
                <p><?php echo $res['description']; ?></p>
                <p><?php echo $res['membres']; ?></p>
                <p><?php echo $res['realisation']; ?></p>
                <p><?php echo $res['evenements']; ?></p>
            </div>
        </div>
    </div>
</div>
    <!--echo '<p>Nom du club : '.$res['nom'].'</p>';
    echo '<p>'.$res['photo'].'</p>';
    echo '<p>Présidé par : '.$res['president'].'</p>';
    echo '<p>Composé de : '.$res['membres'].' membres</p>';
    echo '<p>Description : '.$res['description'].'</p>';
    echo '<p>Realisations : '.$res['realisation'].'</p>';
    echo '<p>Evenements : '.$res['evenements'].'</p>';-->
<?php
    include('chatbox.php');
    include('php/footer.php');
?>