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
    
    <div class="row">
    	<!-- Navigation club -->
        <div class="navbar navbar-default navbar-club">
            <div class="navbar-header">
            	<a class="navbar-brand" href="#">Liste des clubs</a>
            </div>

            <div class="collapse navbar-collapse">
            	<form class="navbar-form navbar-left" method="post">
            		<div class="form-group">
            			<input type="search" id="recherche" class="form-control" placeholder="Chercher un club...">
            		</div>
            		<input type="submit" id="search" class="btn btn-info" value="Chercher" />
            	</form>

            	<ul class="nav navbar-nav navbar-right">
                    <li><button type="button" class="btn btn-info" id="creer">Créer un club</button>
                    </li>
            	</ul>
                
                <!--Permet de cacher toute la liste des clubs-->
                <script>
                $(document).ready(function(){
                    $("#resultat").hide();
                    $("#search").click(function(){
                        $("#resultat").show();
                    });
                    /*$(".btn1").click(function(){
                        $("form").hide();
                       //$("button:first").hide();
                    });*/
                });
                </script>
                <?php if($club->rowCount() >0){?>
                    <ul id='resultat'>
                    <?php while($c=$club->fetch()){ ?>
                        <li><?php echo $c['nom'];?></li>
                    <?php } ?>
                    </ul>
                <?php } else { echo 'Aucun résultat pour : '.$nom; } ?>
            </div>
        </div>
        <!-- /#navigation-club -->
    </div>
    
	<div class="row">
			<div class="col-md-10 col-md-offset-1">
                <!--On cache le formulaire de création de club-->
                <script>
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

<?php
	include('chatbox.php');
    include('php/footer.php');
?>