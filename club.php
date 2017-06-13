<?php
    include('php/header.php');
?>
    


<div class="container">
    
     <!-- Titre -->
    <div class="panel panel-default">
        <div class="panel-heading panel-page-title">
            <span class="glyphicon glyphicon-pawn"></span>
            Liste des clubs
        </div>
    </div>
    <!-- /#titre -->

    <div class="jumbotron custom-jumbotron panel-liste-clubs">
        
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
                <ul class="nav navbar-nav pull-right">
                    <li>
                        <p class="navbar-btn">
                        <button type="button" class="btn btn-info" id="creer">Créer un club</button></p>
                    </li>
                    <li class="">
                        <form class="navbar-form navbar-left" method="post">
                            <div class="form-group">
                                <input type="search" name="recherche" class="form-control" placeholder="Chercher un club...">
                            </div>
                            <input type="submit" name="search" class="btn btn-info" value="Chercher" />
                        </form>
                    </li>
                </ul>
            </div>
            <!-- /#barre-de-navigation -->
            <!--Affichage des résultats de la barre de recherche-->
            <?php
                if(isset($_POST['search'],$_POST['recherche']) AND !empty($_POST['recherche'])){
                    $nom=htmlspecialchars($_POST['recherche']);
                    $club=$bdd->prepare('SELECT id,nom FROM clubs WHERE nom LIKE "%?%"');
                    $club->execute(array($nom));
                    if($club->rowCount()==0){                            
                        $club=$bdd->query('SELECT id,nom FROM clubs WHERE CONCAT(nom,description) LIKE "%'.$nom.'%"');
                    }

                if ($club->rowCount() > 0) { ?>
                    <ul id='resultat'>
                        <?php while( $c=$club->fetch() ) { ?>
                            <li><a href="pageclub.php?nb=<?php echo $c['id']; ?>">
                                <?php echo $c['nom'];?></a></li>
                        <?php } ?>                        </ul>
            <?php } else { echo 'Aucun résultat pour : '.$nom; }} ?>
        </nav>
        <!-- /#navigation -->

        <hr class="divider">

        <!-- Création club -->
        <div class="row">
            <div class="col-md-12">
                <!--Création d'un club-->
                <div class="club-panel" id="form-club">
                    <form method="POST" action="traitementClub.php" id="creerClub" class="form-inline">
                        <div class="form-group">
                            <label>Nom du club</label>
                            <input class="form-control" type=text name="nom" placeholder="Nom du club" required="required"/>
                        </div>
                        
                        <div class="form-group">
                            <label>Description</label>
                            <input class="form-control" type=text name="description" placeholder="Description rapide" required="required"/>
                        </div>                            

                        <div class="form-group">
                            <label>Photo</label>
                            <input class="form-control" type="file" name="photo" required="required"/>
                        </div>

                        <div class="form-group">
                            <label>Nombre de membres</label>
                            <input class="form-control" type="number" name="membres" placeholder="Nombre de membres" required="required"/>
                        </div>

                        <div class="form-group">
                            <label>Nom du president</label>
                            <input class="form-control" type=text name="nompres" placeholder="Président du club" required="required"/>
                        </div>

                        <div class="form-group">
                            <label>Réalisation</label>
                            <textarea class="form-control" name="realisations" placeholder="Réalisations" required="required"></textarea>
                        </div>                            

                        <button type="submit" name="enregistrer" value="Enregistrer" class="btn btn-primary form-control">Enregistrer</button>
                    </form>
                </div>
                
                <?php
                include('php/liste_club.php');
                ?>
            </div>
        </div>
        <!-- /#création-club -->

    </div>
    <!-- /#jumbotron -->
    

</div>

<script>

// On cache le formulaire de création de club
    $(document).ready(function(){
        $("#form-club").hide();
        //$("button:first").hide();
        $("#creer").click(function(){
            $("#form-club").show();
            //$("button:first").show();
        });
        $(".btn1").click(function(){
            $("#form-club").hide();
            //$("button:first").hide();
        });
    });
</script>

<?php
	include('chatbox.php');
    include('php/footer.php');
?>