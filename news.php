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
    $_SESSION['auteur']=$res['auteur'];
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
                    <p><?php echo $res['contenu']; ?>
                    </p>

                    <!-- Input -->
                    <div class="pull-left">
                        <div class="input-placeholder">Commenter...</div>
                    </div>

                    <!-- Réactions : dislike / like / love -->
                    <!--Affichage peu esthétique-->
                    <div class="pull-right">
                        <form method="post"> <!--action="traitementLike.php"-->
                            <!--<button type="button" class="btn btn-basic btn-circle" onclick="<?/*php $insert_dislike=$bdd->query('UPDATE actu SET nbDislike=\'nbDislike+1\' WHERE id="'.$res['id'].'"');*/?>"><span class="glyphicon glyphicon-thumbs-down"></span></button><?php /*echo $res['nbDislike'];*/ ?>
                            <button type="button" class="btn btn-primary btn-circle" onclick="<?p/*hp $insert_like=$bdd->query('UPDATE actu SET nbLike=\'nbLike+1\' WHERE id="'.$res['id'].'"');*/?>"><span class="glyphicon glyphicon-thumbs-up"></span></button><?/*php echo $res['nbLike'];*/ ?>-->
                            <button type="submit" class="btn btn-basic btn-circle" name="dislike"><span class="glyphicon glyphicon-thumbs-down"></span>
                            <?php 
                                if(isset($_POST['dislike'])){
                                    $insert_dislike=$bdd->prepare('UPDATE actu SET nbDislike=\'nbDislike+1\' WHERE id=?');
                                    $insert_dislike->execute(array($res['id']));
                                }
                                echo $res['nbDislike']; 
                            ?>
                            </button>
                            <button type="submit" class="btn btn-primary btn-circle" name ="like"><span class="glyphicon glyphicon-thumbs-up"></span>
                            <?php 
                                if(isset($_POST['like'])){
                                    $insert_like=$bdd->prepare('UPDATE actu SET nbLike=\'nbLike+1\' WHERE id=?');
                                    $insert_like->execute(array($res['id']));
                                }
                                echo $res['nbLike'];
                            ?>
                            </button>
                        </form>
                    </div>
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
   // }
}
?>
