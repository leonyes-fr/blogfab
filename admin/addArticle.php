<?php
session_start();
include('../config/config.php');
include('../librairies/db.lib.php');
include('../librairies/userModel.php');
include('../librairies/articleModel.php');
include('../librairies/categorieModel.php');

userIsLogged('ROLE_AUTHOR');  /* force un niveau d'autorisation de type admin. */


/*Prépare la vue à intégrer au layout. */
$vue = 'addArticle.phtml';
$title = 'Ajout d\'un nouvel article.';
$username = '';  /*Servira dans la vue, vide au départ, prendra la value username dans le formulaire. */
$email = '';
$listCategorie = listCategorie();
$errors = [];

try
{
    if(array_key_exists('title',$_POST))
    {
        
        $uploads_dir = UPLOAD_DIR.'articles';
        $tmp_name = $_FILES['userfile']['tmp_name'];
        $image = $_FILES['userfile']['name'];
        $imgfinal = uniqid().$image;
        move_uploaded_file($tmp_name, $uploads_dir.'/'.$imgfinal);
        
        $title = $_POST['title'];
        $content = $_POST['content'];
        $publishedDate = date('Y-m-d');
        $user = $_SESSION['user']['id'];

        addArticle($title,$content,$publishedDate,$user,$imgfinal);
        
    }
}
catch (PDOException $e)
{
    $vue = 'erreur.phtml';
    $messageErreur =  'Une erreur de connexion a eu lieu :'.$e->getMessage();
}

include('tpl/layout.phtml');
?>
