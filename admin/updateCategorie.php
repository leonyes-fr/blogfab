<?php
session_start();
include('../config/config.php');
include('../librairies/db.lib.php');
include('../librairies/userModel.php');
include('../librairies/articleModel.php');
include('../librairies/categorieModel.php');

userIsLogged('ROLE_AUTHOR');  /* force un niveau d'autorisation de type admin. */


/*Prépare la vue à intégrer au layout. */
$vue = 'updateCategorie.phtml';
$title = 'Modifier une categorie.';
$updatedCategorie = $_GET['id_categorie'];
$errors = [];

try
{
    if(array_key_exists('categorie',$_POST))
    {
        $updatedCategorie = $_POST['updatedCategorie'];
        $categorieName = $_POST['categorie'];
        updateCategorie($updatedCategorie, $categorieName);
        
    }
}
catch (PDOException $e)
{
    $vue = 'erreur.phtml';
    $messageErreur =  'Une erreur de connexion a eu lieu :'.$e->getMessage();
}

include('tpl/layout.phtml');
?>
