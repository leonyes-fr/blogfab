<?php
include('../config/config.php');
include('../librairies/db.lib.php');
include('../librairies/userModel.php');
include('../librairies/articleModel.php');
include('../librairies/categorieModel.php');


$vue = 'listCategorie.phtml';
$title = 'Liste des Articles.';

/* Va chercher en bdd la liste de tous les utilisateurs, les insert dans la variable $listUsers . */ 
$listCategorie = listCategorie();
    
include('tpl/layout.phtml');

 ?>