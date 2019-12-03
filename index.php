<?php
include('config/config.php');
include('librairies/db.lib.php');
include('librairies/userModel.php');
include('librairies/articleModel.php');
include('librairies/categorieModel.php');

/*Prépare la vue à intégrer au layout. */
$vue = 'index.phtml';
$listArticle = listArticle();

include('tpl/layout.phtml');
?>
