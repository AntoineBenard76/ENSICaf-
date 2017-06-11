<?php
    try{ // essaie
        $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8','root',''); 
    }
    catch(Exception $e){ 
        die('Erreur : '.$e->getMessage()); 
    }
    include('php/header.php');
    $sql=$bdd->query('SELECT * FROM clubs where id='.$_GET['nb'].'');
    $res=$sql->fetch();
?>
<div class="club-panel">
    <div class="club-panel">
        <div class="club-title">
            <div class="club-caption">
				<span class="caption-name text-uppercase"><?php echo $res['nom']; ?></span>
                <p><?php echo $res['president']; ?></p>
            </div>
        </div>
    </div>
    <div class="club-body"><br>
        <div class="media">
            <div class="media-left">
                <img class="media-object" src="img/avatars/<?php echo $res['photo']; ?>" alt="photo_club" />
            </div>
            <!--Peu de style--> 
            <div class="media-body">
                <p><?php echo $res['description']; ?></p>
                <p><?php echo $res['membres']; ?></p>
                <p><?php echo $res['realisation']; ?></p>
                <p><?php echo $res['evenements']; ?></p>
            </div>
        </div>
    </div>
</div>
    <!--echo '<p>Nom du club : '.$res['nom'].'</p>';
    echo '<p>'.$res['photo'].'</p>';
    echo '<p>Présidé par : '.$res['president'].'</p>';
    echo '<p>Composé de : '.$res['membres'].' membres</p>';
    echo '<p>Description : '.$res['description'].'</p>';
    echo '<p>Realisations : '.$res['realisation'].'</p>';
    echo '<p>Evenements : '.$res['evenements'].'</p>';-->
<?php
    include('php/footer.php');
?>