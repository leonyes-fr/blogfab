<?php


function connexion()
{
    $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', DB_USER, DB_PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
    return $db;
}

function userIsLogged($role='ROLE_AUTHOR'){

    if(!isset($_SESSION['connected']) || $_SESSION['connected'] != true)
        header('Location:login.php');
         
    if($_SESSION['user']['role'] != 'ROLE_ADMIN' && $_SESSION['user']['role']!= $role)
        header('Location:index.php');
}