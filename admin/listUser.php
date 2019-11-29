<?php
include('../config/config.php');
include('../librairies/db.lib.php');
include('../librairies/userModel.php');

$vue = 'listUser.phtml';
$title = 'Liste des utilisateurs.';

/* Va chercher en bdd la liste de tous les utilisateurs, les insert dans la variable $listUsers . */ 
$listUsers = listUsers();
    
include('tpl/layout.phtml');

 ?>