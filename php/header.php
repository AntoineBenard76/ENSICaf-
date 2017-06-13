<?php
	ini_set('memory_limit','1000M');
	ini_set('post_max_size','800M');
	ini_set('upload_max_filesize','800M');
    session_start();
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <title>ENSICafé</title>
    <link href="https://fonts.googleapis.com/css?family=Bitter:400i|Roboto" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico"/>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!--Librairie jQuery-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
    <script src="./js/jquery.js" type="text/javascript"></script>
    <?php
    include('php/navigation.php');
    ?>

    <!-- Wrapper : contenu principal de la page -->
    <div id="wrapper">

        <?php
        include('php/sidebar.php');
        ?>
        <div id="page-content-wrapper">