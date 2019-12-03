<?php
session_start();
include('../config/config.php');
include('../librairies/db.lib.php');
include('../librairies/userModel.php');
include('../librairies/articleModel.php');

userIsLogged('ROLE_AUTHOR');  /* force un niveau d'autorisation de type admin. */


/*Prépare la vue à intégrer au layout. */
$vue = 'updateArticle.phtml';
$title = 'Modifier un article.';
$articleName = '';
$articleContent = '';
$updatedArticle = $_GET['id_article'];
$errors = [];

try
{
    $value = listArticleToUpdate($_GET['id_article']);   // a FINIR    !!!!!
    $articleName = $value['title']; 
    var_dump($articleName);
    $articleContent = $value['content'];
    var_dump($articleContent);

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
        $updatedArticle = $_POST['updatedArticle'];

        updateArticle($title,$content,$publishedDate,$user,$imgfinal,$updatedArticle);
        
    }
}
catch (PDOException $e)
{
    $vue = 'erreur.phtml';
    $messageErreur =  'Une erreur de connexion a eu lieu :'.$e->getMessage();
}

include('tpl/layout.phtml');
?>
