<?php
include('config/config.php');
include('librairies/db.lib.php');
include('librairies/userModel.php');
include('librairies/articleModel.php');

$vue = 'tpl/index.phtml';
$title = 'Bienvenue dans le blog.';

/* Va chercher en bdd la liste de tous les utilisateurs, les insert dans la variable $listUsers . */ 
$listArticle = listArticle();
    
include('tpl/layout.phtml');

 ?>