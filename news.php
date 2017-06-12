<?php
    try{ // essaie
        $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8','root',''); 
    }
    catch(Exception $e){ 
        die('Erreur : '.$e->getMessage()); 
    }

if(!isset($_GET['id']))
  $req=$bdd->prepare("SELECT * FROM `actu` ORDER BY date DESC LIMIT 3");
else
 $req=$bdd->prepare("SELECT * FROM `actu` WHERE id>'".addslashes($_GET['id'])."' ORDER BY date LIMIT 1");

$req->execute();
$first = true;
while($res = $req->fetch()){
    if($first){
        print '<script>setId('.$res['id'].');</script>';
        $first = false;
    }
    //Supprimer la puce avec le css
    print '<li>';
?>
    <!-- Post 1 -->
    <div class="[panel panel-default] panel-custom">

                <!-- Auteur : image, nom, tags -->
                <div class="panel-heading">
                    <button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <img class="[ img-circle pull-left ]" src="img/avatars/<?php echo $res['avatarActu']; ?>" alt="profile.jpg"/>
                    <h3><?php echo $res['auteur']; ?></h3>
                    <span class="label label-info"><?php echo $res['attributActu']; ?></span>
                    <h5><span></span><?php echo $res['date']; ?></h5>
                    <div class="border-bottom"></div>
                </div>

                <!-- Corps du message -->
                <div class="panel-body">
				<?php
					if(!($res['fichier'])==""){
						if($res['typefichier']=="image"){
							if($res['stockage']=="disque"){
								echo '<a href="img/'.$res['fichier'].'"" ><img src="img/'.$res['fichier'].'" alt="une image" width="400" height="400"/></a>';
							}
							else if($res['stockage']=="url"){
								echo '<img src="'.$im['url'].'" alt="une image" width="400" height="400"/>';
							}
						}
						else if($res['typefichier']=="video"){
							if($res['stockage']=="disque"){
								echo '<video controls="controls" src="video/'.$res['fichier'].'" width="400" height="400"/>une video</video>';
							}
							else if($res['stockage']=="url"){
								$save=$res['fichier'];
								$url=substr($res['fichier'],0,23);
								$url=$url."/embed/".substr($save,32);
								echo '<iframe width="400" height="400" src="'.$url.'" frameborder="0" allowfullscreen></iframe>';
							}
						}
					}
				?>
                    <p><?php echo $res['contenu']; ?>
                    </p>

                    <!-- Input -->
                    <div class="pull-left">
                        <div class="input-placeholder">Commenter...</div>
                    </div>

                    <!-- Réactions : dislike / like -->
                    <div class="pull-right">
                        <button type="button" class="btn btn-dislike btn-circle">
                            <span class="glyphicon glyphicon-heart dislike"></span>
                        </button>
                        <span class="text-muted"><?php echo $res['nbDislike']; ?></span>

                        <button type="button" class="btn btn-like btn-circle">
                            <span class="glyphicon glyphicon-heart like"></span>
                        </button>
                        <span class="text-muted"><?php echo $res['nbLike']; ?></span>
                    </div>
                    <!-- /#réactions -->
                </div>
        <!-- Panel caché pour commenter -->
                <div class="panel-comment">
                        <img class="img-circle" src="img/profile_test1.png" alt="profile_test1.png">
                        <div class="panel-custom-textarea">
                            <textarea rows="2"></textarea>
                            <button type="submit" class="[ btn btn-info disabled ]">Envoyer</button>
                            <button type="reset" class="[ btn btn-default ]">Annuler</button>
						</div>
                <div class="clearfix"></div>
            </div>
            <!-- /#post1 -->
<?php
        print '</li>';
   // }
}
?>
