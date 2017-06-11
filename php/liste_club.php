<?php
    try{ // essaie
        $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8','root',''); 
    }
    catch(Exception $e){ 
        die('Erreur : '.$e->getMessage()); 
    }

    $clubs = $bdd->query('SELECT id,nom,description,photo FROM clubs');

    foreach ($clubs as $value){   
?>
        <div class="club-panel">
			<div class="club-title">
				<div class="club-caption">
					<span class="caption-name text-uppercase"><?php echo $value['nom']; ?></span>
				</div>
				<div class="club-actions pull-right">
					<!--<a href="#">-->
                            <!--<button type="button" class="btn btn-info"><span class="glyphicon glyphicon-log-in"></span>Voir</button>-->
                    <!--Problème avec l'icone-->
                    <!--<input type="button" class="btn btn-info" value="Voir" onclick="javascript:location.href='./pageclub.php'"/><span class="glyphicon glyphicon-log-in"></span>-->
                    <a class="btn btn-info" href="pageclub.php?nb=<?php echo $value['id']; ?>">Voir <span class="glyphicon glyphicon-log-in"></span></a>
					<!--</a>-->
				</div>
			</div>
			<div class="club-body"><br>
                <div class="media">
                    <div class="media-left">
                        <img class="media-object" src="<?php echo $value['photo']; ?>" alt="photo_club" />
                    </div>
                    <div class="media-body">
                        <p><?php echo $value['description']; ?></p>
                    </div>
                </div>
			</div>
		</div>
<?php
    }
?>