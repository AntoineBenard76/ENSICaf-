<?php
session_start();
try{ // essaie
        $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8','root',''); 
    }
    catch(Exception $e){ 
        die('Erreur : '.$e->getMessage()); 
    }
	// création du dossier img
	$dossier = 'img/';
if(is_dir($dossier)){
} 
else{
   mkdir($dossier);
}
	// création du dossier video
	$dossier2 = 'video/';
if(is_dir($dossier2)){
} 
else{
   mkdir($dossier2);
}
$status="";
$stockage="";
$fichier2="";
$_SESSION['auteur']="";
$auteur=$bdd->query('SELECT nom,prenom FROM membres WHERE "'.$_SESSION['id'].'"=id');
foreach($auteur as $a){
	$_SESSION['auteur']=$a['prenom']." ".$a['nom'];
}
   // traitement du fichier
if(isset($_POST['Poster'])){
	$fichier = basename($_FILES['file-preview']['name']);
	$taille_maxi = 100000000;
	$taille = filesize($_FILES['file-preview']['tmp_name']);
	$extensionsimg = array('.png', '.gif', '.jpg', '.jpeg');
	$extensionsvid = array('.mp4', '.ogv', '.webm');
	$extension = strrchr($_FILES['file-preview']['name'], '.'); 
    //Récupération avatar de l'auteur et son attribut
    $avatarActu=htmlspecialchars($_SESSION['avatar']);
    $attributActu=htmlspecialchars($_SESSION['attribut']);
	//Début des vérifications de sécurité...
	if(in_array($extension, $extensionsimg)) //Si l'extension est pas dans le tableau
	{
		$status="image";
		echo "c'est une image";
	}
	if(in_array($extension, $extensionsvid)) //Si l'extension est pas dans le tableau
	{
		$status="video";
		echo "c'est une video";
	}
	if(!in_array($extension, $extensionsvid) && !in_array($extension, $extensionsimg)){
		$erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, mp4, ogv ou webm.';
	}
	if($taille>$taille_maxi)
	{
		 $erreur = 'Le fichier est trop gros...';
	}
	if(!isset($erreur) && $status=="image") //S'il n'y a pas d'erreur, on upload
	{
		 //On formate le nom du fichier ici...
		 $fichier = strtr($fichier, 
			  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
			  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		 $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
		 if(move_uploaded_file($_FILES['file-preview']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		 {
			  echo 'Upload effectué avec succès !';
		 }
		 else //Sinon (la fonction renvoie FALSE).
		 {
			  echo 'Echec de l\'upload !';
		 }
	}
	if(!isset($erreur) && $status=="video") //S'il n'y a pas d'erreur, on upload
	{
		 //On formate le nom du fichier ici...
		 $fichier = strtr($fichier, 
			  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
			  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
		 $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
		 if(move_uploaded_file($_FILES['file-preview']['tmp_name'], $dossier2 . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
		 {
			  echo 'Upload effectué avec succès !';
		 }
		 else //Sinon (la fonction renvoie FALSE).
		 {
			  echo 'Echec de l\'upload !';
		 }
	}
	if(!empty($erreur))
	{
		 echo $erreur;
	}
	if(!empty($fichier)){
		$fichier2 = htmlspecialchars($fichier);
		$stockage="disque";
		/* pour tester la requete sql
		if(!empty($insertion)){
			print_r($bdd->errorInfo());
		}*/
	}
	// pour l'url
	if(!empty($_POST['image'])){
		$fichier2 = htmlspecialchars($_POST['image']);
		$stockage="url";
		$status="image";
		/* pour tester la requete sql
		if(!empty($insertion2)){
			print_r($bdd->errorInfo());
		}*/
	}
	if(!empty($_POST['video'])){
		$fichier2 = htmlspecialchars($_POST['video']);
		$stockage="url";
		$status="video";
		/* pour tester la requete sql
		if(!empty($insertion2)){
			print_r($bdd->errorInfo());
		}*/
	}
}
$_SESSION['dossier']=$dossier;
$_SESSION['dossier2']=$dossier2;
// fin traitement du fichier
if(isset($_POST['Poster'])){
	$publier = htmlspecialchars($_POST['contenu']);
	$type=htmlspecialchars($_POST['btn-publication']);
    $insertion = $bdd->prepare('INSERT INTO actu(id,auteur,contenu,date,type,fichier,typefichier,stockage,nbLike,nbDislike,avatarActu,attributActu) VALUES(NULL,?,?,NOW(),?,?,?,?,0,0,?,?)'); 
    $insertion->execute(array($_SESSION['auteur'],$_POST['contenu'],$type,$fichier2,$status,$stockage,$avatarActu,$attributActu));
}
header("Location:accueil.php");
?>