<?php
    try{ // essaie
        $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8','root',''); 
    }
    catch(Exception $e){ 
        die('Erreur : '.$e->getMessage()); 
    }

if(!isset($_GET['id']))
  $req=$bdd->prepare("SELECT * FROM `actu` WHERE type='annonce' ORDER BY date DESC LIMIT 5");
else
 $req=$bdd->prepare("SELECT * FROM `actu` WHERE id>'".addslashes($_GET['id'])."'AND type='annonce' ORDER BY date LIMIT 1");

$req->execute();
$first = true;
while($res = $req->fetch()){
    if($first){
        print '<script>setId('.$res['id'].');</script>';
        $first = false;
    }
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
                <div class="panel-body text-center">
                    <div class="jumbotron custom-jumbotron-publication">
                        <p>&ldquo; <?php echo $res['contenu']; ?> &bdquo;</p>
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
            </div>
            <!-- /#post1 -->
<?php
    print '</li>';
}
?>
