<?php

function addCategorie($categorie){
    $db = connexion();
    $insert = $db->prepare ('INSERT INTO categorie (categorie_name) VALUES(:categorie_name)');
    $insert->execute(array('categorie_name'=>$categorie)); 

    header('Location: listCategorie.php');
    exit();
}

function listCategorie(){
        $db = connexion();
        $stt = $db->prepare ('SELECT * FROM categorie ');
        $stt->execute(); 
        $listCategorie =$stt->fetchAll(PDO::FETCH_ASSOC);
        return $listCategorie;
}