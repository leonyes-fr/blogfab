<?php
session_start();
include('../config/config.php');
include('../librairies/db.lib.php');
include('../librairies/userModel.php');

userIsLogged('ROLE_AUTHOR');  /* force un niveau d'autorisation de type admin. */


/*Prépare la vue intégrer au layout. */
$vue = 'addArticle.phtml';
$title = 'Ajout d\'un nouvel article.';
$username = '';  /*Servira dans la vue, vide au départ, prendra la value username dans le formulaire. */
$email = '';

$errors = [];

try
{
    if(array_key_exists('title',$_POST))
    {
        var_dump($_FILES);
        /* semble etre $file->moveTo('/path/to/new/file'); */
        /* https://www.php.net/manual/fr/function.move-uploaded-file.php */
        /* Faire le insert dans le html  */
           
    }
}
catch (PDOException $e)
{
    $vue = 'erreur.phtml';
    $messageErreur =  'Une erreur de connexion a eu lieu :'.$e->getMessage();
}

include('tpl/layout.phtml');
?>
