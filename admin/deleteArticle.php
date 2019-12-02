<?php
session_start();
include('../config/config.php');
include('../librairies/db.lib.php');
include('../librairies/articleModel.php');

/*Prépare la vue à intégrer au layout. */
$vue = 'listArticle.php';
$title = 'Liste des articles.';
$updatedArticle = $_GET['id_article'];
$errors = [];

try
{
    if(array_key_exists('id_article',$_GET))
    {
        deleteArticle($updatedArticle);
        
        header('Location: listArticle.php');
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