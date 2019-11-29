<?php
include('../config/config.php');
include('../librairies/db.lib.php');
include('../librairies/userModel.php');

$vue = 'listUser.phtml';
$title = 'Liste des utilisateurs.';

$listUsers = listUsers();
    
include('tpl/layout.phtml');

 ?>