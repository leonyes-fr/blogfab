<?php
session_start();
include('../config/config.php');
include('../librairies/db.lib.php');
include('../librairies/userModel.php');

userIsLogged('ROLE_ADMIN');  /* force un niveau d'autorisation de type admin. */


/*Prépare la vue intégrer au layout. */
$vue = 'addUser.phtml';
$title = 'Ajout d\'un utilisateur';
$username = '';  /*Servira dans la vue, vide au départ, prendra la value username dans le formulaire. */
$email = '';

$errors = [];

try
{
    if(array_key_exists('username',$_POST))
    {
        $username = $_POST['username'];
        $email = $_POST['email'];

        if($_POST['password'] != $_POST['controlPassword']){
            $errors[] = 'Erreur! les champs mot de passe ne sont pas identiques !';
        }

        if(count($errors) == 0)
        {
            /*Va persister un nouveau utilisateur dans la bdd. */
            addUser();
        }
           
    }
}
catch (PDOException $e)
{
    $vue = 'erreur.phtml';
    $messageErreur =  'Une erreur de connexion a eu lieu :'.$e->getMessage();
}

include('tpl/layout.phtml');

?>
