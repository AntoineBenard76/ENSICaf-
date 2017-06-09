<?php
    session_start();
    $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8','root','');
    /*if(isset($_SESSION['id']) AND $_SESSION['id'] > 0)
    {
        $getid = intval($_SESSION['id']);
        $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
        $requser->execute(array($getid));
        $ancienne = $_SESSION['avatar'];
        $userinf = $requser->fetch();
        $_SESSION = array();
        $_SESSION['id'] = $userinf['id'];
        $_SESSION['mail'] = $userinf['mail'];
        $_SESSION['nom'] = $userinf['nom'];
        $_SESSION['prenom'] = $userinf['prenom'];
        $_SESSION['date'] = $userinf['date'];
        $_SESSION['genre'] = $userinf['genre'];
        $_SESSION['avatar'] = $userinf['avatar'];
        $_SESSION['specialite'] = $userinf['specialite'];
        $_SESSION['attribut'] = $userinf['attribut'];
        $_SESSION['parcours'] = $userinf['parcours'];
        
        $updateavatar = $bdd->prepare('UPDATE chat SET avatarMes = ? WHERE avatarMes = ?');
        $updateavatar->execute(array($_SESSION['avatar'], $ancienne));
    }*/
?>
    <ul class="chat">
                    <?php
                $allmsg = $bdd->query('SELECT * FROM chat ORDER BY id DESC LIMIT 0,10');
                while($msg = $allmsg->fetch())
                    {
            ?>
                    
                    <!-- Message 1 -->
                    <li class="left clearfix">
                        <span class="chat-img pull-left"><img src="img/avatars/<?php echo $msg['avatarMes']?>" alt="user_profile" class="img-circle" /></span>
                        <div class="chat-body clearfix">
                            <div class="header">
                                <strong class="primary-font"><?php echo utf8_decode($msg['nomExp']); echo " "; echo utf8_decode($msg['prenomExp']);?></strong>
                                <span class="label label-info"><?php echo utf8_decode($msg['attributExp']);?></span>
                                <small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span><?php echo utf8_decode($msg['dateMes']);?></small>
                            </div>
                            <p>
                                <?php echo $msg['contenuMes'];?>
                            </p>
                        </div>
                    </li>
                    <?php 
                    }
                    ?>
                </ul>