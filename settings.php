<?php
    include('php/header.php');
    if(isset($_SESSION['id']))
    {
        $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
        $requser->execute(array($_SESSION['id']));
        $user = $requser->fetch();
    }
?>
<!-- Contenu principal -->

<div class="container">
	<div class="col-md-8 col-md-offset-2">
        
        <!-- Titre -->
        <div class="panel panel-default">
            <div class="panel-heading panel-page-title">
                <span class="glyphicon glyphicon-cog"></span>
                Paramètres
            </div>
        </div>
        <!-- /#titre -->
        
		<div class="panel panel-settings">

			<div class="panel-body">
                <!-- Avatar -->
				<div class="media settings-avatar">
                    <div class="media-left">
                        <img class="media-object img-circle" src="img/avatars/<?php echo $user['avatar']?>" height="150" width="150" alt="avatar">
                    </div>
                    
                    <div class="media-body">
                        <h4><br>Changer d'image de profil</h4>
                        <!-- Send image -->
                        <!--<form method="POST" action="reload.php?id='.$_SESSION['id']" enctype="multipart/form-data">-->
                        <form method="POST" action="reload.php?id=<?php echo $_SESSION['id']; ?>" enctype="multipart/form-data">
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
                                    <span class="preview-input-title">Image</span>
                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="avatar" />
                                </div>
                                </span>
                            </div>
                            <button name="reload" class="[ btn btn-success ] settings-apply pull-right" type="submit">Mettre à jour l'image de profil</button>
                        </form>
                        <!-- /#send-image -->
                    </div>
				</div>
                <!-- /#avatar -->

                <br>
                
                <!--<form method="POST" action="reload.php?id='.$_SESSION['id']">-->
                <form method="POST" action="reload.php?id=<?php echo $_SESSION['id']; ?>">
                    <!-- Mail -->
                    <div class="form-group">
    					<label class="col-md-4 control-label">Adresse mail</label>
    					<div class="col-md-4">
    						<input type="email" name="newmail" placeholder="Mail" class="form-control input-md" value="<?= $user['mail']?>"/>
    					</div>
    				</div>
                    <br><br><br>
                    <!-- /#mail -->

                    <!-- Password -->
    				<div class="form-group">
    					<label class="col-md-4 control-label">Nouveau mot de passe</label>
    					<div class="col-md-4">
    						<input type="password" name="newmdp1" placeholder="Nouveau mot de passe" class="form-control input-md"/>
    				    </div>
                    </div>
                    <br><br>
    				<div class="form-group">
    					<label class="col-md-4 control-label">Confirmer le nouveau mot de passe</label>
    					<div class="col-md-4">
    						<input type="password" name="newmdp2" placeholder="Confirmer le mot de passe" class="form-control input-md"/>
    					</div>
    				</div>
                    <br><br>
                    <!-- /#password -->

                    <!-- Spécialité -->
                    <div class="form-group">
    					<label class="col-md-4 control-label">Spécialité</label>
    					<div class="col-md-4">
    						<select class="form-control" name="newspecialite">
                                <option>Informatique &amp; Réseaux</option>
                                <option>Automatiques et Systèmes embarqués</option>
                                <option>Mécanique</option>
                                <option>Textile &amp; Fibres</option>
                                <option>FIP</option>
                                <option>Autre</option>
                            </select>
    					</div>
    				</div>
                    <br><br>
                    <!-- /#spécialité -->
                    
                    <!-- Parcours -->
                    <label class="col-md-4 control-label">Parcours</label>
                    <div class="form-group">
                        <textarea class="form-control" name="newparcours" placeholder="Entrez votre parcours..." rows="5"></textarea>
                    </div>
                    <!-- /#parcours -->

                    <div class="settings-buttons">
                       <!-- <button class="[ btn btn-info ]">
                            <a href="profil.php?id=<?php /* $_SESSION['id']*/ ?>">Retour</a>
                        </button>-->
                        <input class="btn btn-info" type="button" value="Retour" onclick="javascript:location.href='profil.php?id=<?= $_SESSION['id'] ?>'"/>
                    </div>
                    <button class="[ btn btn-success ] settings-apply pull-right" type="submit">Mettre à jour le profil</button>
                </form>
                <?php if(isset($msg)) { echo $msg; } ?>
			</div>
		</div>
	</div>
</div>

<!-- Contenu principal -->

<?php
	include('chatbox.php');
    include('php/footer.php');
?>