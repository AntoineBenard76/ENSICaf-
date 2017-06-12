<?php
    include('php/header.php');
?>

<!-- Contenu principal -->
<div class="container">

    <div class="col-md-10 col-md-offset-1">
        <div class="panel-group panel-apropos" id="accordion" role="tablist" aria-multiselectable="true">

            <!-- L'EQUIPE -->
            <div class="panel panel-default panel-equipe">
                <!-- Header -->
                <div class="panel-heading">
                    <a class="accordion-toggle btn-block" data-toggle="collapse" href="#collapse-equipe">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"> L'équipe</span>
                    </a>
                </div>
                <!-- /#header -->

                <!-- Body -->
                <div id="collapse-equipe" class="panel-collapse collapse in" role="tabpanel">
                    <div class="panel-body">
                        <!-- Membres de l'équipe -->
                        <ul class="media-list">
                            <!-- Antoine -->
                            <li class="media">
                                <div class="media-left">
                                    <img class="img-circle" id="img-antoine" src="img/equipe/antoine.jpg" alt="antoine.jpg"/>
                                </div>
                                <div class="media-body">
                                    <h4>Antoine Bénard</h4>
                                    <span class="label label-primary">Chef de projet</span>
                                    <p>Chef du Projet ensicafé, étudiant dynamique et motivé qui a fait de son mieux pour booster les troupes ! :D</p>
                                    <blockquote>
                                        <p>
                                            <q> Hassenforder, on l'adore ! </q>
                                            <small>Antoine, 5 minutes avant l'envoi du chèque.</small>
                                        </p>
                                    </blockquote>
                                </div>
                            </li>
                            <hr class="divider">

                            <!-- Olivier -->
                            <li class="media">
                                <div class="media-body text-right">
                                    <span class="label label-danger">Designer</span>
                                    <h4>Olivier Tinh</h4>
                                    <p>Roi du design, cet homme a rendu non-radioactif le style de tout le projet !</p>
                                    <blockquote>
                                        <p>
                                            <q> J'ai faim. </q>
                                            <small>Olivier, lors de l'édition de cette page.</small>
                                        </p>
                                    </blockquote>
                                </div>
                                <div class="media-right">
                                    <img class="img-circle" src="img/equipe/olivier.jpg" alt="olivier.jpg"/>
                                </div>
                            </li>
                            <hr class="divider">

                            <!-- Nolwenn -->
                            <li class="media">
                                <div class="media-left">
                                    <img class="img-circle" src="img/equipe/nolwenn.jpg" alt="nolwenn.jpg"/>
                                </div>
                                <div class="media-body">
                                    <h4>Nolwenn Bernard</h4>
                                    <span class="label label-info">Nolwenn</span>
                                    <p>Travailleuse acharnée, elle a officiellement déclaré la guerre aux bases de données !</p>
                                </div>
                            </li>
                            <hr class="divider">

                            <!-- Saad -->
                            <li class="media">
                                <div class="media-body text-right">
                                    <span class="label label-success">Nageur</span>
                                    <h4>Saad Bennani</h4>
                                    <p>Nageur professionnel, il ne sait pas comment il s'est retrouvé dans cette galère ...</p>
                                    <blockquote>
                                        <p>
                                            <q> JE SAIS PAS, JE SAIS PAS !! </q>
                                            <small>Saad, en se retrouvant devant le jury.</small>
                                        </p>
                                    </blockquote>
                                </div>
                                <div class="media-right">
                                    <img class="img-circle" src="img/equipe/saad.png" alt="saad.jpg"/>
                                </div>
                            </li>
                            <hr class="divider">

                            <!-- Thomas -->
                            <li class="media">
                                <div class="media-left">
                                    <img class="img-circle" src="img/profile_test1.png" alt="thomas.jpg"/>
                                </div>
                                <div class="media-body">
                                    <h4>Thomas Blangero</h4>
                                    <span class="label label-warning">Thomas</span>
                                    <p>L'homme qui se balade partout et upload les données. L'otaku du groupe.</p>
                                </div>
                            </li>
                            <hr class="divider">

                            <!-- Baptiste -->
                            <li class="media">
                                <div class="media-body text-right">
                                    <span class="label label-default">Baptiste</span>
                                    <h4>Baptiste Refalo</h4>
                                    <p></p>
                                </div>
                                <div class="media-right">
                                    <img class="img-circle" src="img/profile_test1.png" alt="baptiste.jpg"/>
                                </div>
                            </li>

                        </ul>
                        <!-- /#membres-de-l'équipe -->
                    </div>
                </div>
                <!-- /#body -->
            </div>
            <!-- /#L'EQUIPE -->


            <!-- L'ORIGINE DU PROJET -->
            <div class="panel panel-default panel-origine">
                <!-- Header -->
                <div class="panel-heading">
                    <a class="accordion-toggle btn-block" data-toggle="collapse" href="#collapse-origine">
                        <span class="glyphicon glyphicon-info-sign" aria-hidden="true"> L'origine du projet</span>
                    </a>
                </div>
                <!-- /#header -->

                <!-- Body -->
                <div id="collapse-origine" class="panel-collapse collapse in" role="tabpanel">
                    <div class="panel-body">
                        <a href="http://www.ensisa.uha.fr/"><img id="logo-ensisa" src="img/ensisa.jpg" alt="Bug Ensisa"/></a>
                        <div class="col-md-12">
                            <p> Ce projet nous a été proposé par Jonathan WEBER et de manière plus générale par l'ENSISA, école d'ingénieurs à Mulhouse.
                            </p>
                        </div>
                    </div>
                </div>
                <!-- /#body -->
            </div>
            <!-- /#L'ORIGINE-DU-PROJET -->

            <!-- REMERCIEMENT -->
            <div class="panel panel-default panel-remerciement">
                <!-- Header -->
                <div class="panel-heading">
                    <a class="accordion-toggle btn-block" data-toggle="collapse" href="#collapse-remerciement">
                        <span class="glyphicon glyphicon-heart" aria-hidden="true"> Remerciement</span>
                    </a>
                </div>
                <!-- /#header -->

                <!-- Body -->
                <div id="collapse-remerciement" class="panel-collapse collapse in" role="tabpanel">
                    <div class="panel-body">
                        <div class="col-md-12">
                            <p>Un grand remerciement à toute l'équipe de ce projet sans qui rien ne se serait fait ! Et un big-up spécial à François Straebler dont le soutien a été incroyable !</p>
                        </div>
                    </div>
                </div>
                <!-- /#body -->
            </div>
            <!-- /#L'ORIGINE-DU-PROJET -->

        </div>
    </div>

</div>
<!-- /#contenu-principal -->

<?php
    include('chatbox.php');
    include('php/footer.php');
?>