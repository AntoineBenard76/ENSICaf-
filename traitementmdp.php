<?php
    session_start();
    include('php/header-login.php');
    
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');


if(isset($_POST['envoyer'])){
    $_SESSION['erreur']="";
    if(!empty($_POST['email'])){
        $email=htmlspecialchars($_POST['email']);
        $_SESSION['email']=$email;
        if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            $emailexist=$bdd->prepare('SELECT id FROM membres WHERE mail=?');
            $emailexist->execute(array($email));
            $emailexist=$emailexist->rowcount();

            if($emailexist==1){
                //$_SESSION['email']=$email;
                $code="";
                // Création du code qui sera envoyé à l'utilisateur
                for($i=0;$i<8;$i++){
                    $code.=mt_rand(0,9);
                }
                
                // Vérification de l'existence du mail dans la table récupération
                $mail_recup_exist = $bdd->prepare('SELECT id FROM recuperation WHERE mail=?');
                $mail_recup_exist ->execute(array($email));
                $mail_recup_exist=$mail_recup_exist->rowcount();
                if($mail_recup_exist==1){
                    // Mise à jour du code
                    $insert = $bdd->prepare('UPDATE recuperation SET code=? WHERE mail=?');
                    $insert->execute(array($code,$_SESSION['email']));
                }else{
                    $confirme=0;
                    $insert = $bdd->prepare('INSERT INTO recuperation(mail,code,confirme) VALUES(?,?,?)');
                    $insert->execute(array($_SESSION['email'],$code,$confirme));
                }
                
                // Envoi du mail de modification
                require 'PHPMailer-master/PHPMailerAutoload.php';

                $mail = new PHPMailer;

                // $mail->SMTPDebug = 3;                               // Enable verbose debug output

                $mail->isSMTP();                                      // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                      // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'ensicafe2017@gmail.com';           // SMTP username
                $mail->Password = 'ensisa2017';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
            
                $mail->setFrom('ensicafe2017@gmail.com', utf8_decode('ENSICafé'));
                $mail->addAddress($email);     // Add a recipient

                $mail->isHTML(true);                                  // Set email format to HTML

                $mail->Subject = utf8_decode('Mot de passe oublié');
                // Penser à corriger le chemin de l'URL du mail
                $mail->Body    = utf8_decode('Voici votre code de récupération : <b>'.$code.'</b>');
                $mail->AltBody = utf8_decode('Voici votre code de récupération : <b>'.$code.'</b>');

                if(!$mail->send()) {
                    echo 'Le message n\'a pas pu être envoyé.';
                    echo 'Mailer Error: ' . $mail->ErrorInfo;
                } else {
                   //echo 'message envoyé';
                   header("Location:traitementCode.php");
                }
            }else{
                $_SESSION['erreur']= 'Cette adresse n\'est pas enregistrée';
            }
        }else{
            $_SESSION['erreur']= 'Adresse mail incorrecte';
        }
    }else{
            $_SESSION['erreur']= 'Veuillez indiquer votre adresse e-mail';
        }
}
?>