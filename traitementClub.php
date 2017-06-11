<?php
    try{ // essaie
        $bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8','root',''); 
    }
    catch(Exception $e){ 
        die('Erreur : '.$e->getMessage()); 
    }

    if(isset($_POST['enregistrer'])){
        if(!empty($_POST['nom'])){
            $nom = htmlspecialchars($_POST['nom']);   

            if(!empty($_POST['description'])){
                $description = htmlspecialchars($_POST['description']);   

                if(!empty($_POST['photo'])){
                    $photo = htmlspecialchars($_POST['photo']);   

                    if(!empty($_POST['membres'])){
                        $membres = htmlspecialchars($_POST['membres']);   

                        if(!empty($_POST['nompres'])){
                            $nompres = htmlspecialchars($_POST['nompres']);   

                            if(!empty($_POST['realisations'])){
                                $realisations = htmlspecialchars($_POST['realisations']);   

                                if(!empty($_POST['evenements'])){
                                    $evenements = htmlspecialchars($_POST['evenements']); 
                                    $sql=$bdd->query('INSERT INTO clubs VALUES (NULL"'.$nom.'","'.$description.'","'.$photo.'","'.$membres.'","'.$nompres.'","'.$realisations.'","'.$evenements.'")');
                                }
                            }
                        }
                    }
                }
            }
        }
    }
?>