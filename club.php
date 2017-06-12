<?php
    include('php/header.php');
//Possibilité d'utiliser un explode 
    $club=$bdd->query('SELECT nom FROM clubs ORDER BY id DESC');
    if(isset($_POST['recherche']) AND !empty($_POST['recherche'])){
        $nom=htmlspecialchars($_POST['recherche']);
        $club=$bdd->query('SELECT nom FROM clubs WHERE nom LIKE "%"'.$nom.'"%"');
        if($club->rowCount()==0){
            $club=$bdd->query('SELECT nom FROM clubs WHERE CONCAT(nom,description) LIKE "%'.$nom.'%"');
        }
    }
?>

<div class="container">
    
     <!-- Titre -->
    <div class="panel panel-default">
        <div class="panel-heading panel-page-title">
            <span class="glyphicon glyphicon-pawn"></span>
            Liste des clubs de l'ensisa
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
                                <input type="search" id="recherche" class="form-control" placeholder="Chercher un club...">
                            </div>
                            <input type="submit" id="search" class="btn btn-info" value="Chercher" />
                        </form>
                    </li>
                </ul>
            </div>
            <!-- /#barre-de-navigation -->
        </nav>
        <!-- /#navigation -->

        <hr class="divider">

        <!-- idk -->
        <?php
            if ($club->rowCount() > 0) { ?>
                <ul id='resultat'>
                    <?php while( $c=$club->fetch() ) { ?>
                        <li><?php echo $c['nom'];?></li>
                    <?php } ?>
                </ul>
        <?php } else { echo 'Aucun résultat pour : '.$nom; } ?>

    </div>
    <!-- /#jumbotron -->
    
	<div class="row">
			<div class="col-md-10 col-md-offset-1">
                
                <!--Création d'un club-->
                <!--Peu esthétique-->
                <div class="club-panel" id="form-club">
                    <div class="innter-form">
                        <form method="POST" action="traitementClub.php" id="creerClub" class="sa-innate-form">
                            <label>Nom du club</label>
                            <input type=text name="nom" placeholder="Nom du club" required="required"/>

                            <label>Description</label>
                            <input type=text name="description" placeholder="Description" required="required"/>

                            <label>Photo</label>
                            <input type=text name="photo" placeholder="Insérer un photo" required="required"/>

                            <label>Nombre de membres</label>
                            <input type=integer name="membres" placeholder="Nombre de membres" required="required"/>

                            <label>Nom du president</label>
                            <input type=text name="nompres" placeholder="Nom president" required="required"/>

                            <label>Réalisation</label>
                            <textarea name="realisations" placeholder="Réalisations" required="required"></textarea>
                            
                            <input type="submit" name="enregistrer" value="Enregistrer" class="btn btn-info"/>
                        </form>
                    </div>
                </div>
                
				<?php
                    include('php/liste_club.php');
                ?>
			</div>
	</div>
</div>

<script>
// Permet de cacher toute la liste des clubs
    $(document).ready(function(){
        $("#resultat").hide();
        $("#search").click(function(){
            $("#resultat").show();
        });
    });

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