<?php
    try{ // essaie
        $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8','root',''); 
    }
    catch(Exception $e){ 
        die('Erreur : '.$e->getMessage()); 
    }

//Gesttion actualité
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

                    <h3><?php echo utf8_decode($res['auteur']); ?></h3>

                    <span class="label label-info"><?php echo $res['attributActu']; ?></span>
                    <h5><span></span><?php echo $res['date']; ?></h5>
                    <div class="border-bottom"></div>
                </div>

                <!-- Corps du message -->
                <div align="center" class="panel-body">
				<?php
					if(!($res['fichier'])==""){
						if($res['typefichier']=="image"){
							if($res['stockage']=="disque"){
								echo '<a href="img/'.$res['fichier'].'"" ><img src="img/'.$res['fichier'].'" alt="img" width="480" height="320" /></a>';
							}
							else if($res['stockage']=="url"){
								echo '<img src="'.$res['fichier'].'" alt="une image" width="480" height="320" />';
							}
						}
						else if($res['typefichier']=="video"){
							if($res['stockage']=="disque"){
								echo '<video controls="controls" src="video/'.$res['fichier'].'" width="720" height="480"/>video</video>';
							}
							else if($res['stockage']=="url"){
								$save=$res['fichier'];
								$url=substr($res['fichier'],0,23);
								$url=$url."/embed/".substr($save,32);
								echo '<iframe width="480" height="320" src="'.$url.'" frameborder="0" allowfullscreen></iframe>';
							}
						}
					}
				?>
                    <!-- Contenu des publications -->
                    <div class="jumbotron custom-jumbotron-publication">
                        <p>&ldquo; <?php echo htmlspecialchars($res['contenu']); ?> &bdquo;</p>
                    </div>
                    
                    <!-- Input -->
                    <div class="pull-left">
                        <div class="input-placeholder">Commenter...</div>
                    </div>


                    <!-- Réactions : dislike / like -->
                    <div class="pull-right">
                        <!-- Dislike -->
                        <a class="btn btn-circle btn-dislike" href="article.php?name=dislike&id=<?php echo $res['id']; ?>">
                            <span class="glyphicon glyphicon-heart"></span>
                        </a>
                        <span class="text-muted">
                            <?php echo $res['nbDislike']; ?>
                        </span>

                        <!-- Like -->
                        <a class="btn btn-circle btn-like" href="article.php?name=like&id=<?php echo $res['id']; ?>">
                            <span class="glyphicon glyphicon-heart"></span>
                        </a>
                        <span class="text-muted">
                            <?php echo $res['nbLike']; ?>
                        </span>                                        
                    </div>
                   
                </div>

                <!--Affichage des commentaires-->
                <div>
                    <ul class="chat">
                        <?php
                            $commentaires=$bdd->prepare('SELECT * FROM commentaire WHERE idactu=?');
                            $commentaires->execute(array($res['id']));
                            while($com=$commentaires->fetch()){
                        ?>
                        <li class="left post-comment">
                            <span class="chat-img pull-left"><img src="img/avatars/<?php echo $com['avatar']; ?>" alt="user_profile" class="img-circle" /></span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font"><?php echo utf8_decode($com['nomAuteur'])."  ".utf8_decode($com['prenomAuteur']); ?></strong>
                                    <span class="label label-info"><?php echo utf8_decode($com['attributCom']);?></span>
                                </div>
                                <p>
                                    <?php echo $com['commentaire'];?>
                                </p>
                            </div>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>

                </div>

                <!-- Panel caché pour commenter -->
                <div class="panel-comment">
                        <img class="img-circle" src="img/avatars/<?php echo $_SESSION['avatar']; ?>" alt="profile_test1.png">
                        <div class="panel-custom-textarea">
<!-- commentaire Thomas à vérifier
                            <textarea rows="2"></textarea>
                            <button type="submit" class="[ btn btn-info disabled ]">Envoyer</button>
                            <button type="reset" class="[ btn btn-default ]">Annuler</button>
						</div>
                <div class="clearfix"></div>
-->
                            <form class="form-group" method="post" action="article.php?name=commenter&id=<?php echo $res['id']; ?>">
                                <textarea class="form-control" rows="2" name="commentaire" required></textarea>
                                <input type="submit" class="[ btn btn-primary ]" value="Envoyer" name="submit_com"/>
                                <input type="reset" class="[ btn btn-default ]" value="Annuler" />
                            </form>
                        </div>
                        <div class="clearfix"></div>
                </div>
            </div>
            <!-- /#post1 -->
<?php
        print '</li>';
   // }
}
?>
