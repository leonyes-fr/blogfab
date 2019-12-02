<?php
session_start();
include('../config/config.php');
include('../librairies/db.lib.php');
include('../librairies/categorieModel.php');

/*Prépare la vue à intégrer au layout. */
$vue = 'listArticle.php';
$title = 'Liste des articles.';
$updatedCategorie = $_GET['id_categorie'];
$errors = [];

try
{
    if(array_key_exists('id_categorie',$_GET))
    {
        deleteCategorie($updatedCategorie);
        
        header('Location: listCategorie.php');
        exit();
    }
}
catch (PDOException $e)
{
    $vue = 'erreur.phtml';
    $messageErreur =  'Une erreur de connexion a eu lieu :'.$e->getMessage();
}

include('tpl/layout.phtml');
?>