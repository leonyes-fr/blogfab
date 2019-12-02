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


function updateCategorie($updateCategorie, $categorieName){
    $db = connexion();
    $update = $db->prepare ('UPDATE categorie SET categorie_name = :categorie_name WHERE id_categorie = :updatedcategorie');
    $update->execute(array('categorie_name'=>$categorieName, 'updatedcategorie'=>$updateCategorie)); 

    header('Location: listCategorie.php');
    exit();
}

function deleteCategorie($updatedCategorie){
    $db = connexion();
    $request = $db->prepare('DELETE FROM categorie WHERE id_categorie = :id_categorie');
    $request->execute(array('id_categorie' => $updatedCategorie));
}


