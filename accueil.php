<?php
    include('php/header.php');
?>

<!---->
<div class="container">

    <!-- ********** CAROUSEL NEWS : annonces/news en haut de la page d'accueil ********** -->

    <div class="row">
        <div class="col-md-12">
            <div class="carousel slide" data-ride="carousel" id="carousel-news">
                <!-- Bottom Carousel Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-news" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-news" data-slide-to="1"></li>
                    <li data-target="#carousel-news" data-slide-to="2"></li>
                </ol>

                <!-- Carousel Slides / News -->
                <div class="carousel-inner">
                    <!-- News 1 -->
                    <div class="item active">
                        <blockquote>
                            <div class="row">
                                <!-- Auteur (nom + tag) -->
                                <div class="col-md-3 author-outer">
                                    <div class="author-inner">
                                        <img class="img-circle" src="http://www.reactiongifs.com/r/overbite.gif" alt="news1" />
                                        <p>Université de Haute-Alsace
                                        <span class="label label-danger">Université</span></p>
                                    </div>
                                </div>
                                <!-- Contenu (titre, message, redirection) -->
                                <div class="col-md-9">
                                    <h4>Accord de Paris : l’UE s’inquiète de la décision américaine</h4>
                                    <span class="news-contenu">Dans l’attente de l’annonce d’une sortie éventuelle des Etats-Unis, l’Union européenne, la Chine et la Russie défendent le traité visant à limiter le réchauffement climatique.</span>
                                    <a href="#"><span class="news-more"> Lire la suite...</span></a>
                                    <br><small class="news-date">14 juin 2028</small>
                                </div>
                            </div>
                        </blockquote>
                    </div>

                    <!-- News 2 -->
                    <div class="item">
                        <blockquote>
                            <div class="row">
                                <div class="col-md-3 author-outer">
                                    <div class="author-inner">
                                        <img class="img-circle" src="img/profile_test1.png" alt="news2" />
                                        <p>Le chat du designer  
                                        <span class="label label-info">Chat</span>
                                        <span class="label label-warning">Testeur</span></p>
                                    </div>
                                </div>
                                    <div class="col-md-9">
                                        <h4>Trois fabricants de croquettes animales condamnés à 35 millions d'euros d'amende pour entente</h4>
                                        <span class="news-contenu">Les groupes sanctionnés sont le suisse Nestlé (Purina), et les américains Mars (Royal Canin) et Colgate-Palmolive (Hill's Pet Nutrition).</span>
                                        <a href="#"><span class="news-more"> Lire la suite...</span></a>
                                        <br><small class="news-date">14 juin 2028</small>
                                    </div>
                            </div>
                        </blockquote>
                    </div>

                    <!-- News 3 -->
                    <div class="item">
                        <blockquote>
                            <div class="row">
                                <div class="col-md-3 author-outer">
                                    <div class="author-inner">
                                        <img class="img-circle" src="img/profile_test2.jpg" alt="news3">
                                        <p>Kermit la grenouille
                                        <span class="label label-success">Grenouille</span></p>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <h4>L’Inde assure la France de son soutien à l’accord de Paris sur le climat</h4>
                                    <span class="news-contenu">Après le retrait américain de l’accord de Paris, le climat était au cœur de la rencontre entre Narendra Modi et Emmanuel Macron, samedi à Paris.</span>
                                    <a href="#"><span class="news-more"> Lire la suite...</span></a>
                                    <br><small class="news-date">14 juin 2028</small>
                                </div>
                            </div>
                        </blockquote>
                    </div>

                </div>

                <!-- Carousel Prev/Next Buttons -->
                <a data-slide="prev" href="#carousel-news" class="left carousel-control"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a data-slide="next" href="#carousel-news" class="right carousel-control"><span class="glyphicon glyphicon-chevron-right"></span></a>

            </div>
        </div>
    </div>
    <!-- #carousel-news -->


    <!-- ********** PUBLICATION : envoyer une publication ********** -->
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3">
            <!-- Panel -->
            <div class="panel panel-publication">
                <!-- Panel heading -->
                <div class="panel-heading" id="accordion-toggle" data-toggle="collapse" data-target="#collapse-publication" onclick="togglePublication(event)">
                    <span class="glyphicon glyphicon-comment"></span><span class="chatbox-name"> Créer une publication</span>
                    <span class="glyphicon glyphicon-chevron-down pull-left toggle-publication"></span>
                    <span class="glyphicon glyphicon-chevron-down pull-right toggle-publication"></span>
                </div>
                <!-- /#panel-heading -->

                <div id="collapse-publication" class="panel-collapse collapse" role="tabpanel">
                    <div class="panel-body">
                        <!-- Upload (publication) -->
                        <form enctype="multipart/form-data" accept-charset="utf-8" class="form-group publication-msg" method="POST" action="traitementFichier.php">
                            <!-- Envoyer une image -->
                            <div class="input-group preview">
                                <input type="text" class="form-control preview-filename" disabled="disabled">
                                <span class="input-group-btn">
                                <!-- preview-clear button -->
                                <button type="button" class="btn btn-default preview-clear" style="display:none;">
                                    <span class="glyphicon glyphicon-remove"></span> Annuler
                                </button>
                                <!-- preview-input -->
                                <div class="btn btn-default preview-input">
                                    <span class="glyphicon glyphicon-folder-open"></span>
                                    <span class="preview-input-title">Fichier</span>
                                    <input type="file" accept="image/png, image/jpeg, image/gif, video/mp4, video/ogv, video/webm, image/jpg" name="file-preview" />
                                </div>
                                </span>
                            </div>
                            <!-- /#envoyer-une-image -->

                            <!-- URL -->
							<input class="form-control" type="text" name="image" placeholder="URL image (.png, .jpg, .jpeg, .gif)" />
							<input class="form-control" type="text" name="video" placeholder="URL vidéo (Youtube)" />
                            <!-- /#URL -->

                            <!-- Envoyer un message -->
                            <textarea class="form-control" placeholder="Entrez votre message" rows="3" name="contenu"></textarea>
							<input type="hidden" name="MAX_FILE_SIZE" value="100000000" />
                            <input class="[ btn btn-primary ]" type="submit" name="Poster" value="Poster" />
                            <button class="[ btn btn-default ]" type="reset">Annuler</button>
                            <div class="btn-group pull-right" data-toggle="buttons">

                            <!-- Annonce/publication -->
                            <div class="btn-group btn-annonce" data-toggle="buttons">

                                <label class="btn btn-success active">
                                    <input type="radio" name="btn-publication" value="Publication" checked>
                                    <span class="glyphicon glyphicon-ok"></span> Publication
                                </label>

                                <label class="btn btn-info">
                                    <input type="radio" name="btn-publication" value="Annonce">
                                    <span class="glyphicon glyphicon-ok"></span> Annonce
                                </label>
                                
                            </div>
                            <!-- /#annonce/publication -->

                            </div>
                        </form>
                        <!-- /#upload-publication -->
                    </div>
                </div>
            </div>
            <!-- /#panel -->
        </div>
    </div>
    <!-- /#publication -->


    <!-- ********** POST : publications sur la page d'accueil ********** -->
    <script src="js/news.js" type="text/javascript"></script>
    <div class="row">
        <div class="col-md-10 col-lg-offset-1">
            <ul id="news">
                <?php 
                   include('news.php');
                ?>
            </ul>
        </div>
    </div>
    <!-- /#post -->
<!-- /#container -->

<?php
    include('chatbox.php');
    include('php/footer.php');
?>